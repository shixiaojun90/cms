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
		$this->basic=Yaf_Loader::import(FUNC_PATH.'/F_Basic.php');
		$this->password=Yaf_Loader::import(FUNC_PATH.'/F_Password.php');
		$this->network=Yaf_Loader::import(FUNC_PATH.'/F_Network.php');
		$this->zhlanguage=include_once(LANG_PATH.'/zh/Comment.php');
		$this->enlanguage=include_once(LANG_PATH.'/en/Comment.php');
		$this->kalanguage=include_once(LANG_PATH.'/ka/Comment.php');
		header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Allow-Origin: http://localhost:8080');
        header('Access-Control-Allow-Methods: GET, POST');
		session_start();
    }
	
    /**
     * 用户注册
     */
    public function aacsaveAction(){
        try{
			if($_POST['language_id']==1){
				$msg=$this->zhlanguage;
			}elseif($_POST['language_id']==2){
				$msg=$this->enlanguage;
			}else{
				$msg=$this->kalanguage;
			}
			
			if(empty($_POST['tel'])){
				$error['code']='1002';
				$error['msg']=$msg['error_tel'];
				Helper::response($error);
			}
			
			if(preg_match('/^\d*$/', $_POST['tel'])){
				$userinfo=$this->m_aacmoney->getUserBytel($_POST['tel']);
				
				if(!empty($userinfo['tel'])){
					$error['code']='1002';
					$error['msg']=$msg['lock_tel'];
					Helper::response($error);
				}
				
				if(empty($_POST['moneyadd'])){
					$error['code']='1002';
					$error['msg']=$msg['moneyadd_error'];
					Helper::response($error);
				}
				
				if(empty($_POST['okexmoney'])){
					$error['code']='1002';
					$error['msg']=$msg['okexmoney_error'];
					Helper::response($error);
				}
				
				if(empty($_POST['captcha'])){
					$error['code']='1002';
					$error['msg']=$msg['null_code'];
					Helper::response($error);
				}
				
				if(strtolower($_POST['captcha']) != strtolower($_SESSION['aacCaptcha'])){
					$error['code']='1002';
					$error['msg']=$msg['money_code'];
					Helper::response($error);
				}
				
				$insert['tel']=stripHTML($_POST['tel']);
				$insert['moneyadd']=stripHTML($_POST['moneyadd']);
				$insert['okexmoney']=stripHTML($_POST['okexmoney']);
				$insert=quotes($insert);
				$insert['c_time']=time();
				$insert['ip']=getClientIP();
				$uid=$this->m_aacmoney->Insert($insert);
				
				if($uid){
					$error['code']='0';
					$error['msg']=$msg['money_success'];
					Helper::response($error);
				}else{
					$error['code']='0';
					$error['msg']=$msg['money_error'];
					Helper::response($error);
				}
			}else{
				$error['code']='1002';
				$error['msg']=$msg['null_tel'];
				Helper::response($error);
			}
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
	
}
