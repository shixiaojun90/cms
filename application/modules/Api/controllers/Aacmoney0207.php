<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午10:42
 */
class AacmoneyController extends BasicController {
    private function init(){
        $this->m_aacmoney=$this->load('aacmoney');
        $this->m_record=$this->load('record');
		$this->password=Yaf_Loader::import(FUNC_PATH.'/F_Password.php');
		$this->network=Yaf_Loader::import(FUNC_PATH.'/F_Network.php');
		header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Allow-Origin: http://aac.acuteangle.com');
        header('Access-Control-Allow-Methods: GET, POST');
		session_start();
    }
	
    /**
     * 用户注册
     */
    public function aacsaveAction(){
        try{
			$captcha  = $_POST['captcha'];

			if(preg_match('/^\d*$/', $_POST['qq'])){
				$userinfo=$this->m_aacmoney->getUserByQQ($_POST['qq']);
				if(!empty($_POST['recommend'])){
					$recommend_id=$_POST['recommend'];
					//$link="http://localhost:8081/main.html?recommend=".$recommend_id;
				}
				
				if(empty($_POST['qq'])){
					$error['code']='1002';
					$error['msg']='请输入您的QQ号';
					Helper::response($error);
				}elseif(strtolower($captcha) != strtolower($_SESSION['aacCaptcha'])){
					$error['code']='1002';
					$error['msg']='验证码有误';
					Helper::response($error);
				}
				else{
					$salt=fetch_salt(10);
					unset($_POST['captcha']);
					//unset($_POST['link']);
					
					$insert=$_POST;
					$insert['moneyadd']=$_POST['moneyadd'];//base64_encode($_POST['moneyadd']);//钱包地址
					$insert['salt']=$salt;
					$insert['identifying']=GetRandStr(4);//生成用户标识
					$insert['c_time']=time();
					$insert['access_token']=session_id().$salt;
					$insert['recommend']=empty($recommend_id) ? 0 : $recommend_id;//推荐人
					$insert['ip']=getClientIP();
					$insert['platform']=!empty($_POST['platform']) ? removeXSS($_POST['platform']) : '0';
					//$insert['link']="http://localhost:8081/main.html?recommend=".$recommend_id;
					
					if($userinfo['logins'] < 1){
						$error['code']='1003';
						$error['msg']='活动已结束';
						Helper::response($error);
						//第一次登录
						$insert['aacmoney']=intval(5);//奖励aac数量
						$insert['logins']=($userinfo['logins']+1);//登录次数
						$uid=$this->m_aacmoney->Insert($insert);
						
						if(!empty($_POST['recommend'])){
							$recommend=$this->m_aacmoney->getUserById($recommend_id);//推荐人编号
							$link="http://aac.acuteangle.com/main.html?recommend=".$uid;
							$this->m_aacmoney->UpdateByID(array('aacmoney'=>($recommend['aacmoney']+2)),$recommend['id']);
							$this->m_aacmoney->UpdateByID(array('link'=>$link),$uid);
							//$this->addrecord($uid,$recommend_id,($reinfo['aacmoney']+2),'平台奖励（'.$recommend['qq'].'）,'.($reinfo['aacmoney']+2).' AAC,推荐了'.$_POST['qq']);
							//推荐人记录
							$record['uid']=$recommend['id'];
							$record['recommend']=$recommend_id;
							$record['c_time']=time();
							$record['aacmoney']=$insert['aacmoney'];
							$record['remark']=$recommend['qq'].'邀请了'.$_POST['qq'].'得了2个AAC';
							$this->m_record->Insert($record);
							/**用户自身记录**/
							$rethis['uid']=$uid;
							$rethis['recommend']=$recommend_id;
							$rethis['c_time']=time();
							$rethis['aacmoney']=$insert['aacmoney'];
							$rethis['remark']=$_POST['qq'].'注册得了'.$insert['aacmoney'].'个AAC';
							$this->m_record->Insert($rethis);
						}else{
							$link['link']="http://aac.acuteangle.com/main.html?recommend=".$uid;
							$link['recommend']=empty($recommend_id) ? 0 : $recommend_id;//推荐人
							$this->m_aacmoney->UpdateByID($link,$uid);
							$record['uid']=$uid;
							$record['recommend']=$uid;
							$record['c_time']=time();
							$record['aacmoney']=$insert['aacmoney'];
							$record['remark']=$_POST['qq'].'注册得了'.$insert['aacmoney'].'个AAC';
							
							$rid=$this->m_record->Insert($record);
						}
						
						//$rid=$this->addrecord($uid,$recommend_id,$insert['aacmoney'],'平台奖励（'.$_POST['qq'].'）,'.$insert['aacmoney'].' AAC'.'第'.($userinfo['logins']+1).'次登录'.'链接地址:<a href='.$insert['link'].'>点击跳转</a>');
						
						/*if(!$rid){
							$error['code']='1002';
							$error['msg']='记录插入失败';
							Helper::response($error);
						}*/
					}else{
						$nbsp=array(" ","　","\t","\n","\r");
						if(trim(str_replace($nbsp,'',$userinfo['moneyadd']))!=trim(str_replace($nbsp,'',$_POST['moneyadd']))){
							$error['code']='1002';
							$error['msg']='您输入的钱包地址有误';
							Helper::response($error);
						}
						
						$salt=fetch_salt(10);
						$access_token=session_id().$salt;
						$this->m_aacmoney->UpdateByID(array('access_token'=>$access_token,'logins'=>($userinfo['logins']+1)),$userinfo['id']);
						$uid=$userinfo['id'];
					}
					
					if(!$uid){
						$error['code']='1002';
						$error['msg']='提交失败';
						Helper::response($error);
					}else{
						$data['code']='0';
						$data['id']=base64_encode($uid.'#'.$insert['salt']);
						$data['token']=$insert['access_token'];
						$data['qq']=$_POST['qq'];
						
						Helper::response($data);
					}
				}
			}else{
				$error['code']='1002';
				$error['msg']='请输入正确的qq号';
				Helper::response($error);
			}
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
	
	

    public function recordAction(){
        try{
			$arr=explode('#',base64_decode($_POST['id']));
			$sort='id desc';
            $data=$this->m_record->getArtListByPage($_POST['rowCount'],$_POST['current'],$sort,$_POST['searchPhrase'],'(uid='.$arr[0].')');
			$post=$data['data'];
			//$list=array();
			
			foreach ($data['data'] as $key=>$val){
                //$data['data'][$key]['qq']=$this->m_aacmoney->getUserById($val['uid'])['qq'];
				//$data['data'][$key]['recommend']=$this->m_aacmoney->getUserById($val['recommend'])['qq'];
				$data['data'][$key]['c_time']=date('Y-m-d',$val['c_time']);
            }
			
			$data['qq']=$this->m_aacmoney->getUserById($arr[0])['qq'];
			$data['link']=$this->m_aacmoney->getUserById($arr[0])['link'];
			$data['aacmoney']=$this->m_aacmoney->getUserById($arr[0])['aacmoney'];
			//$data['data']['link']=$this->m_aacmoney->getUserById($_POST['id'])['link'];
			if(!empty($data)){
				Helper::response('0',$data);
			}else{
				$error['code']='1002';
				$error['msg']='没有数据';
				Helper::response($error);
			}
           
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
	
	public function logoutAction(){
		$arr=explode('#',base64_decode($_POST['id']));
		$aacmoney=$this->m_aacmoney->getUserById($arr[0]);//推荐人编号
		if(!empty($aacmoney['access_token'])){
			$ret['access_token']='';
			$this->m_aacmoney->UpdateByID($ret,$arr[0]);
			$error['code']='0';
			$error['msg']='注销成功';
			Helper::response($error);
		}else{
			$error['code']='1002';
			$error['msg']='注销失败';
			Helper::response($error);	
		}
        
        //$this->goHome();
    }
}
