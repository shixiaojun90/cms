<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午10:42
 */
class VerifController extends BasicController {
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

    /**
     * 用户注册
     */
    public function getcodeAction(){
        try{
			date_default_timezone_set('PRC');
			ini_set('date.timezone','Asia/Chongqing');
			set_time_limit(0);
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
			$userinfo=$this->m_register->getUserByname($_POST['email']);//检查邮件
			if(!empty($userinfo['email']) || trim($userinfo['email']) == trim($_POST['email'])){
				$error['code']='1002';
				$error['msg']=$msg['error_exist'];
				Helper::response($error);
			}
			$time=strtotime(date('Y-m-d H:i:s',strtotime('+30 minute')));//设置过期时间
			$email=$_POST['email'];
			$code=trim(strtolower(GetRandStr(4)));
			$this->setSession("{$code}",array('email'=>$email,'code'=>$code));
			$verify=$msg['varify_code'].$code.$msg['valid_time'];
			
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
	
	
	
	

}
