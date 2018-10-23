<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午11:10
 */

class GroupemailController extends BasicController {
    private function init(){
        Yaf_Registry::get('adminPlugin')->checkLogin();
        Yaf_Registry::get('PermissionPlugin')->checkPermission();
        $this->m_groupemail=$this->load('groupemail');
        $this->m_emailmsg=$this->load('emailmsg');
    }

    public function indexAction(){
		$emailinfo=$this->m_groupemail->emailinfo();
		$emailinfo['tomails']=unserialize($emailinfo['tomail']);
		$this->getView()->assign(array('email'=>$emailinfo));
		$this->getView()->assign(array('emailmsg'=>$this->m_emailmsg->emailinfo()));
		$statusmsg=array("0"=>"发送失败","1"=>"发送成功");
		$this->getView()->assign(array('statusmsg'=>$statusmsg));
    }
	
	public function sendemailAction(){
		try{
			date_default_timezone_set('PRC');
			ini_set('date.timezone','Asia/Chongqing');
			set_time_limit(0);
			Yaf_loader::import(LIB_PATH . '/PHPMailer/src/Exception.php');
			Yaf_loader::import(LIB_PATH . '/PHPMailer/src/PHPMailer.php');
			Yaf_loader::import(LIB_PATH . '/PHPMailer/src/SMTP.php');
			$mail = new \PHPMailer\PHPMailer\PHPMailer;
			$mail->SMTPDebug = 0;
			$mail->isSMTP();
			$mail->SMTPAuth = true; 
			$mail->Host = 'smtp.exmail.qq.com';
			$mail->SMTPSecure = 'ssl';
			$mail->Port = 465;
			$mail->CharSet = 'UTF-8';
			$mail->FromName = $_POST['fromName'];
			$mail->Username = 'dev@acuteangle.com';
			$mail->Password = 'ckB76EnChVHpDX6u';
			$mail->From = 'dev@acuteangle.com';
			$mail->isHTML(true);
			
			if(!empty($_POST['tomail'])){
				$emaillist=explode(",",$_POST['tomail']);
				
				$statusmsg=array("0"=>"发送失败","1"=>"发送成功");
				for($i=0; $i<count($emaillist); $i++){
					$mail->addAddress("{$emaillist[$i]}");
					$mail->Subject = 'Acute Angle';
					$mail->Body = "<p>{$_POST['content']}</p>";
					$status = $mail->send();
					if($status){
						$list['success'][] = $emaillist[$i];
					}else{
						$list['error'][] = $emaillist[$i];
					}
					$ret['tomail']=$emaillist[$i];
					$ret['content']=$_POST['content'];
					$ret['status']=$status;
					$ret['c_time']=time();
					$ret['fromName']=$_POST['fromName'];
					$this->m_emailmsg->insert($ret);
				}
			}
			$ret=$_POST;
			$ret['tomail']=serialize($ret['tomail']);
			unset($ret['content']);
			$emailinfo=$this->m_groupemail->emailinfo();
			if($emailinfo){
				$this->m_groupemail->UpdateByID($ret,$emailinfo['id']);
			}else{
				$this->m_groupemail->insert($ret);
			}
			if(!empty($list['success'])){
				$data['list']['success']=join(",",$list['success']);
			}elseif(!empty($list['error'])){
				$data['list']['error']=join(",",$list['error']);
			}
			//print_r($data);
			Helper::response($data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
	
	public function resetsendAction(){
		try{
			date_default_timezone_set('PRC');
			ini_set('date.timezone','Asia/Chongqing');
			set_time_limit(0);
			Yaf_loader::import(LIB_PATH . '/PHPMailer/src/Exception.php');
			Yaf_loader::import(LIB_PATH . '/PHPMailer/src/PHPMailer.php');
			Yaf_loader::import(LIB_PATH . '/PHPMailer/src/SMTP.php');
			$mail = new \PHPMailer\PHPMailer\PHPMailer;
			$mail->SMTPDebug = 0;
			$mail->isSMTP();
			$mail->SMTPAuth = true; 
			$mail->Host = 'smtp.exmail.qq.com';
			$mail->SMTPSecure = 'ssl';
			$mail->Port = 465;
			$mail->CharSet = 'UTF-8';
			$mail->FromName = $_POST['fromName'];
			$mail->Username = 'dev@acuteangle.com';
			$mail->Password = 'ckB76EnChVHpDX6u';
			$mail->From = 'dev@acuteangle.com';
			$mail->isHTML(true);
			
			if(!empty($_POST['tomail'])){
				$emaillist=explode(",",$_POST['tomail']);
				
				$statusmsg=array("0"=>"发送失败","1"=>"发送成功");
				for($i=0; $i<count($emaillist); $i++){
					$mail->addAddress("{$emaillist[$i]}");
					$mail->Subject = 'Acute Angle';
					$mail->Body = "<p>{$_POST['content']}</p>";
					$status = $mail->send();
					if($status){
						$list['success'][] = $emaillist[$i];
					}else{
						$list['error'][] = $emaillist[$i];
					}
					$ret['tomail']=$emaillist[$i];
					$ret['content']=$_POST['content'];
					$ret['status']=$status;
					$ret['c_time']=time();
					$ret['fromName']=$_POST['fromName'];
					$this->m_emailmsg->insert($ret);
				}
			}
			$ret=$_POST;
			$ret['tomail']=serialize($ret['tomail']);
			unset($ret['content']);
			$emailinfo=$this->m_groupemail->emailinfo();
			if($emailinfo){
				$this->m_groupemail->UpdateByID($ret,$emailinfo['id']);
			}else{
				$this->m_groupemail->insert($ret);
			}
			if(!empty($list['success'])){
				$data['list']['success']=join(",",$list['success']);
			}elseif(!empty($list['error'])){
				$data['list']['error']=join(",",$list['error']);
			}
			//print_r($data);
			Helper::response($data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
	
	public function resendAction(){
		try{
			date_default_timezone_set('PRC');
			ini_set('date.timezone','Asia/Chongqing');
			set_time_limit(0);
			Yaf_loader::import(LIB_PATH . '/PHPMailer/src/Exception.php');
			Yaf_loader::import(LIB_PATH . '/PHPMailer/src/PHPMailer.php');
			Yaf_loader::import(LIB_PATH . '/PHPMailer/src/SMTP.php');
			$emailinfo=$this->m_emailmsg->getemailByid($_POST['id']);
			$mail = new \PHPMailer\PHPMailer\PHPMailer;
			$mail->SMTPDebug = 0;
			$mail->isSMTP();
			$mail->SMTPAuth = true; 
			$mail->Host = 'smtp.exmail.qq.com';
			$mail->SMTPSecure = 'ssl';
			$mail->Port = 465;
			$mail->CharSet = 'UTF-8';
			$mail->FromName = $emailinfo['fromName'];
			$mail->Username = 'dev@acuteangle.com';
			$mail->Password = 'ckB76EnChVHpDX6u';
			$mail->From = 'dev@acuteangle.com';
			$mail->isHTML(true);
			
			if(!empty($_POST['id'])){
				$statusmsg=array("0"=>"发送失败","1"=>"发送成功");
				$mail->addAddress("{$emailinfo['tomail']}");
				$mail->Subject = 'Acute Angle';
				$mail->Body = "<p>{$emailinfo['content']}</p>";
				$status = $mail->send();
				if($status){
					$data['code'] = 'success';
					$ret['status']=$status;
					$ret['c_time']=time();
					$this->m_emailmsg->UpdateByID($ret,$_POST['id']);
				}else{
					$data['code'] = 'error';
				}
			}
			
			Helper::response($data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
    
}
