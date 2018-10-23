<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午10:42
 */
class NewaacController extends BasicController {
    private function init(){
        $this->m_newaac=$this->load('newaac');
		$this->m_aacmoney=$this->load('aacmoney');
		$this->password=Yaf_Loader::import(FUNC_PATH.'/F_Password.php');
		$this->network=Yaf_Loader::import(FUNC_PATH.'/F_Network.php');
		header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
		session_start();
    }
	
    /**
     * 用户注册
     */
    public function aacsaveAction(){
        try{
			//$captcha  = $_POST['captcha'];

			if(preg_match('/^\d*$/', $_POST['qq'])){
				$userinfo=$this->m_aacmoney->getUserByQQ($_POST['qq']);
				$newinfo=$this->m_newaac->getUserByQQ($_POST['qq']);
				if(!empty($_POST['recommend'])){
					$recommend_id=$_POST['recommend'];
					//$link="http://localhost:8081/main.html?recommend=".$recommend_id;
				}
				
				if(empty($_POST['qq'])){
					$error['code']='1002';
					$error['msg']='请输入您的QQ号';
					Helper::response($error);
				}
				
				$nbsp=array(" ","　","\t","\n","\r");
				if(trim(str_replace($nbsp,'',$userinfo['moneyadd']))!=trim(str_replace($nbsp,'',$_POST['moneyadd']))){
					$error['code']='1002';
					$error['msg']='您输入的旧钱包地址有误';
					Helper::response($error);
				}
				
				$salt=fetch_salt(10);
				$insert=$_POST;
				$insert['moneyadd']=$_POST['moneyadd'];//base64_encode($_POST['moneyadd']);//钱包地址
				$insert['newmoneyadd']=$_POST['newmoneyadd'];//base64_encode($_POST['moneyadd']);//钱包地址
				$insert['salt']=$salt;
				$insert['identifying']=GetRandStr(4);//生成用户标识
				$insert['c_time']=time();
				$insert['access_token']=session_id().$salt;
				$insert['recommend']=empty($recommend_id) ? 0 : $recommend_id;//推荐人
				$insert['ip']=getClientIP();
				$insert['platform']=!empty($_POST['platform']) ? removeXSS($_POST['platform']) : '0';
				//$insert['link']="http://localhost:8081/main.html?recommend=".$recommend_id;
				
				if($newinfo['logins'] < 1){
					$uid=$this->m_newaac->Insert($insert);
				}else{
					$salt=fetch_salt(10);
					$access_token=session_id().$salt;
					$platform=!empty($_POST['platform']) ? removeXSS($_POST['platform']) : '0';
					$this->m_newaac->UpdateByID(array('access_token'=>$access_token,'platform'=>$platform,'logins'=>($newinfo['logins']+1)),$newinfo['id']);
					$uid=$newinfo['id'];
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
			//$data['link']=$this->m_aacmoney->getUserById($arr[0])['link'];
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
