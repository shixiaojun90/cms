<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午11:10
 */

class WalletmsgController extends BasicController {
    private function init(){
        Yaf_Registry::get('adminPlugin')->checkLogin();
        Yaf_Registry::get('PermissionPlugin')->checkPermission(true);
        $this->m_admin=$this->load('User');
        $this->m_audit = $this->load('Audit');
        $this->m_walletmsg = $this->load('Walletmsg');
		$this->m_setting=$this->load('setting');
        $this->globar=Yaf_Registry::get('GlobarPlugin')->getArray_key($this->m_setting->getoptions(),'name');
    }

    public function indexAction(){
        $this->getView()->assign(array('offset'=>$this->globar['offset']['value']));
    }

    /**
     * 分页获取新闻分类
     */
    public function tabPageAction(){
        try{
        	empty($_POST['current']) ? $params['current']='1' : $params['current']=$_POST['current'];
        	empty($_POST['rowCount']) ? $params['rowCount']=$this->globar['offset']['value'] : $params['rowCount']=$_POST['rowCount'];
			$sort=' id desc';
			$data=$this->m_walletmsg->Conditions(" AND language_id=1")->getArtListByPage($params['rowCount'],$params['current'],$sort,$_POST['searchPhrase'],'(language_id=1)');
			$wtype=array("1"=>"提现通过","2"=>"提现驳回","3"=>"冻结用户","4"=>"恢复用户");
			foreach ($data['data'] as $key=>$val){
                $data['data'][$key]['creater']=$this->m_admin->getUserById($val['creater'])['login'];
                $data['data'][$key]['info']=base64_decode($val['info']);
                $data['data'][$key]['wtype']=$wtype[$val['wtype']];
                $data['data'][$key]['c_time']=date("Y-m-d H:i:s",$val['c_time']);
                $data['data'][$key]['u_time']=date("Y-m-d H:i:s",$val['u_time']);
            }
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
	
	
	public function addAction(){
        try{
            //添加
			$list=$_POST;
			unset($list['files']);
			/*******
			wtype1代表填写通过2代表填写驳回3代表冻结用户4代表恢复用户,5消息公告,6版本更新
			*******/
			$auditid=$this->m_audit->Insert(array('c_time'=>time(),'uid'=>$_SESSION['user']['id']));
			if($auditid){
				foreach($list as $key => $val){
					if(is_array($val)){
						$val['id']=$auditid;
						$val['wtype']=$list['wtype'];
						$val['creater']=$_SESSION['user']['id'];
						$val['c_time']=time();
						$val['u_time']=time();
						$insertid=$this->m_walletmsg->Insertsetfield($val);
					}
				}
			}
			Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
	
	
	public function getByIdAction(){
        try{
			if(isset($_POST['wtype']) || !empty($_POST['wtype'])){
				$wtype=' AND wtype='.$_POST['wtype'];
			}else{
				$wtype='';
			}
			
            $data['zhdata']=$this->m_walletmsg->Conditions(" AND language_id=1".$wtype)->getArticlebyId($_POST['id']);
            $data['endata']=$this->m_walletmsg->Conditions(" AND language_id=2".$wtype)->getArticlebyId($_POST['id']);
            $data['kadata']=$this->m_walletmsg->Conditions(" AND language_id=3".$wtype)->getArticlebyId($_POST['id']);
            $data['jedata']=$this->m_walletmsg->Conditions(" AND language_id=4".$wtype)->getArticlebyId($_POST['id']);
			foreach($data as $key => $val){
				$data[$key]=quotes($val);
			}
			
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
	
	
    public function updateByIdAction(){
        try{
			$list=$_POST;
			unset($list['files']);
			unset($list['id']);
			unset($list['wtype']);

			foreach($list as $key => $val){
				if(is_array($val)){
					$val['creater']=$_SESSION['user']['id'];
					$val['u_time']=time();
					$val['wtype']=$_POST['wtype'];
					$post=quotes($val);
					//print_r($post);exit;
					$this->m_walletmsg->Conditions(" AND language_id=".$val['language_id'])->UpdateByID($post,$_POST['id']);
				}
			}
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
	
	
	public function deleteAction(){
        try{
            $this->m_walletmsg->Where(array('id'=>$_POST['id']))->Delete();
            Helper::response('0',$result);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
	
	
	/**
     * 上传图片
     */
    public function uploadimgAction(){
        $path='upload/wallet/';
        $up = new Upload($_FILES['file'], $path);
        $extpos = strrpos($_FILES['file']['name'],'.');//返回字符串filename中'.'号最后一次出现的数字位置
        $ext = substr($_FILES['file']['name'],$extpos+1);
        $newFileName = md5(basename($_FILES['file']['name'],$ext)); //文件名
		
        $ret=$up->upload($newFileName);
        if($ret['code']===0){
            Helper::response('0','http://'.$_SERVER['HTTP_HOST'].'/'.$path.$ret['img']);
        }
    }
	

}
