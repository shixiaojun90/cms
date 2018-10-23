<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午10:42
 */
class FindController extends BasicController {
    private function init(){
		$this->m_register=$this->load('Register');
		$this->m_emailcode=$this->load('emailcode');
        $this->zhlanguage=include_once(LANG_PATH.'/zh/Register.php');
		$this->enlanguage=include_once(LANG_PATH.'/en/Register.php');
		$this->kalanguage=include_once(LANG_PATH.'/en/Register.php');
		$this->password=Yaf_Loader::import(FUNC_PATH.'/F_Password.php');
		$this->network=Yaf_Loader::import(FUNC_PATH.'/F_Network.php');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
		session_start();
    }

    
	
	/*******找回密码发送邮件*******/
	/**
     * 用户注册
     */
    public function getcodeAction(){		
        try{
			//$this->setSession("12345",array('email'=>'test@qq.com','code'=>'123456'));exit;
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
			
			$email=$_POST['email'];
			$userinfo=$this->m_register->getUserByname($_POST['email']);
			if(empty($userinfo['email'])){
				$error['code']='1002';
				$error['msg']=$msg['email_nodefind'];
				Helper::response($error);
			}
			$time=strtotime(date('Y-m-d H:i:s',strtotime('+30 minute')));//设置过期时间
			$code=trim(strtolower(GetRandStr(4)));
			$this->setSession("{$code}",array('email'=>$email,'code'=>$code));
			
			$verify=$msg['varify_code'].$code;
			
			$insert['email']=$email;//邮箱
			$insert['code']=$code;//验证码
			$insert['language_id']=$_POST['language_id'];//language_id
			$insert['c_time']=$time;
			$codeid=$this->m_emailcode->Insert($insert);
			$flag=0;
			if($codeid){
				$flag = sendMail($email,$verify);
			}else{
				$success['code']='1002';
				$success['msg']=$msg['email_error'];
				Helper::response($success);
			}
			
			//$flag = sendMail($email,$verify);
			if($flag){
				$success['code']='0';
				$success['msg']=$msg['email_success'];
				Helper::response($success);
			}else{
				$success['code']='1002';
				$success['msg']=$msg['email_error'];
				Helper::response($success);
			}
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
	
	/*******找回密码********/
	/**
     * 用户注册
     */
    public function saveAction(){
        try{
			if($_POST['language_id']==1){
				$msg=$this->zhlanguage;
			}elseif($_POST['language_id']==2){
				$msg=$this->enlanguage;
			}else{
				$msg=$this->kalanguage;
			}

			if(preg_match("/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i", $_POST['email'])){
				$userinfo=$this->m_register->getUserByname($_POST['email']);
				if(!empty($_POST['code'])){
					//$code=trim(strtolower($_POST['code']));
					$code=$this->m_emailcode->getemailbycode(trim(strtolower($_POST['code'])));//检查邮件
				}

				if(empty($userinfo['email'])){
					$error['code']='1002';
					$error['msg']=$msg['email_nodefind'];
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
				/*if($this->getSession("{$code}")['time'] < time() || empty($this->getSession("{$code}")['time'])){
					$error['code']='1002';
					$error['msg']=$msg['error_efficacy'];
					Helper::response($error);
				}*/
				
				if($code['code']!=trim(strtolower($_POST['code'])) || $code['email']!=trim($_POST['email'])){
					$error['code']='1002';
					$error['msg']=$msg['error_code'];
					Helper::response($error);
				}
				
				if(empty($_POST['password'])){
					$error['code']='1002';
					$error['msg']=$msg['error_password'];
					Helper::response($error);
				}else{
					$salt=fetch_salt(10);
					$update['password']=sha1($salt.sha1($_POST['password']));
					$update['salt']=$salt;
					$update['c_time']=time();
					$update['ip']=getClientIP();
					
					$uid=$this->m_register->UpdateByID($update,$userinfo['id']);
					if(!$uid){
						$error['code']='1002';
						$error['msg']=$msg['update_error'];
						Helper::response($error);
					}else{
						$success['code']='0';
						$success['msg']=$msg['update_success'];
						$result = $this->m_emailcode->DeleteByID($code['id']);
						Helper::response($success);
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

}
