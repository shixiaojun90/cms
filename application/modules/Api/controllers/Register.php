<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午10:42
 */
class RegisterController extends BasicController {
    private function init(){
        $this->m_register=$this->load('Register');
        $this->m_emailcode=$this->load('emailcode');
        $this->zhlanguage=include_once(LANG_PATH.'/zh/Register.php');
		$this->enlanguage=include_once(LANG_PATH.'/en/Register.php');
		$this->kalanguage=include_once(LANG_PATH.'/ka/Register.php');
		$this->password=Yaf_Loader::import(FUNC_PATH.'/F_Password.php');
		$this->network=Yaf_Loader::import(FUNC_PATH.'/F_Network.php');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
		session_start();
    }

    /**
     * 用户注册
     */
    public function regAction(){
        try{
			if($_POST['language_id']==1){
				$msg=$this->zhlanguage;
			}elseif($_POST['language_id']==2){
				$msg=$this->enlanguage;
			}else{
				$msg=$this->kalanguage;
			}
			if(empty($_POST['email'])){
				$error['code']='1002';
				$error['msg']=$msg['error_valid'];
				Helper::response($error);
			}
			if(preg_match("/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i", $_POST['email'])){
				$userinfo=$this->m_register->getUserByname($_POST['email']);//检查邮件
				$username=$this->m_register->getUserByuser($_POST['username']);//检查用户名称
				if(!empty($_POST['code'])){
					//$code=trim(strtolower($_POST['code']));
					$code=$this->m_emailcode->getemailbycode(trim(strtolower($_POST['code'])));//检查邮件
				}
				
				/*if(empty($this->getSession("{$_POST['code']}"))){
					$error['code']='1002';
					$error['msg']=$msg['error_code'];
					Helper::response($error);
				}*/

				if(!empty($userinfo['email']) || trim($userinfo['email']) == trim($_POST['email'])){
					$error['code']='1002';
					$error['msg']=$msg['error_exist'];
					Helper::response($error);
				}
				
				if(trim($username['username']) == trim($_POST['username'])){
					$error['code']='1002';
					$error['msg']=$msg['error_name'];
					Helper::response($error);
				}
				
				if(empty($_POST['password'])){
					$error['code']='1002';
					$error['msg']=$msg['error_password'];
					Helper::response($error);
				}
				if(empty($_POST['username'])){
					$error['code']='1002';
					$error['msg']=$msg['error_username'];
					Helper::response($error);
				}
				
				if(empty($code)){
					$error['code']='1002';
					$error['msg']=$msg['error_code'];
					Helper::response($error);
				}
				
				if($code['code']!=trim(strtolower($_POST['code'])) || $code['email']!=trim($_POST['email'])){
					$error['code']='1002';
					$error['msg']=$msg['error_code'];
					Helper::response($error);
				}
				
				if($code['c_time'] < time() || empty($code['c_time'])){
					$error['code']='1002';
					$error['msg']=$msg['error_efficacy'];
					Helper::response($error);
				}
				
				else{
					unset($_POST['code']);
					$salt=fetch_salt(10);
					$userinfo=$_POST;
					$userinfo['password']=sha1($salt.sha1($_POST['password']));
					$userinfo['salt']=$salt;
					$userinfo['email']=trim($userinfo['email']);
					$userinfo['c_time']=time();
					$userinfo['username']=!empty($_POST['username']) ? trim($_POST['username']) : "";
					$userinfo['ip']=getClientIP();
					$userinfo['access_token']=session_id().$userinfo['salt'];
					
					$uid=$this->m_register->Insert($userinfo);
					if(!$uid){
						$error['code']='1002';
						$error['msg']=$msg['error_mistake'];
						Helper::response($error);
					}else{
						//$mail=sendMail($_POST['email']);
						$data['code']='0';
						$ulist['username']=$_POST['username'];
						$ulist['uid']=$uid;
						$ulist['token']=$userinfo['access_token'];
						$data['data']=$ulist;
						$result = $this->m_emailcode->DeleteByID($code['id']);
						$this->setSession('userinfo',$ulist);
						Helper::response($data);
					}
				}
			}else{
				$error['code']='1002';
				$error['msg']=$msg['error_valid'];
				Helper::response($error);
			}
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }

    public function loginAction(){
        try{
			if($_POST['language_id']==1){
				$msg=$this->zhlanguage;
			}elseif($_POST['language_id']==2){
				$msg=$this->enlanguage;
			}else{
				$msg=$this->kalanguage;
			}
			if(empty($_POST['email'])){
				$error['code']='1002';
				$error['msg']=$msg['error_username'];
				Helper::response($error);
			}
			if(preg_match("/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i", $_POST['email'])){
				$userinfo=$this->m_register->getUserByname($_POST['email']);
			}else{
				$username=$_POST['email'];
				$userinfo=$this->m_register->getUserByuser($username);
			}
            if(!empty($userinfo)){
				//$userinfo=$this->m_register->getUserByname($_POST['email']);
				if($userinfo['status']=='1'){
					$error['code']='1002';
					$error['msg']=$msg['update_status'];
					Helper::response($error);
				}
				if(empty($_POST['password'])){
					$error['code']='1002';
					$error['msg']=$msg['error_password'];
					Helper::response($error);
				}
				if(empty($userinfo['email'])){
					$error['code']='1002';
					$error['msg']=$msg['error_notexist'];
					Helper::response($error);
				}elseif(compile_password($_POST['password'],$userinfo['salt'])!=$userinfo['password']){
					$error['code']='1002';
					$error['msg']=$msg['error_passworder'];
					Helper::response($error);
				}else{
					$data['code']='0';
					$ulist['username']=$userinfo['username'];
					$ulist['uid']=$userinfo['id'];
					$ulist['token']=session_id().$userinfo['id'].$userinfo['salt'];
					
					$data['data']=$ulist;
					
					$this->setSession('userinfo',$ulist);
					$ret['access_token']=$ulist['token'];
					$this->m_register->UpdateByID($ret,$userinfo['id']);
					
					Helper::response($data);
				}
			}else{
				$error['code']='1002';
				$error['msg']=$msg['error_notexist'];
				Helper::response($error);
			}
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
	
	public function logoutAction(){
		if($_POST['language_id']==1){
			$msg=$this->zhlanguage;
		}elseif($_POST['language_id']==2){
			$msg=$this->enlanguage;
		}else{
			$msg=$this->kalanguage;
		}
		//$userinfo=$this->getSession('userinfo');
		$userinfo=$this->m_register->getUserById($_POST['uid']);
		if(!empty($userinfo)){
			if($userinfo['access_token']==$_POST['token'] && $userinfo['id']==$_POST['uid']){
				$outstatus=$this->unsetSession('userinfo');
				$ret['access_token']='';
				$this->m_register->UpdateByID($ret,$userinfo['id']);
				$error['code']='0';
				$error['msg']=$msg['logout_success'];
				Helper::response($error);
			}else{
				$error['code']='1002';
				$error['msg']=$msg['error_logout'];
				Helper::response($error);
			}
		}else{
			$error['code']='1002';
			$error['msg']=$msg['error_notlogin'];
			Helper::response($error);	
		}
        
        //$this->goHome();
    }
}
