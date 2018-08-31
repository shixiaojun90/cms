<?php
/**
 * File: F_Network.php
 * Functionality: Extra network functions
 * Author: Nic XIE
 * Date: 2012-03-01
 */

/**
 * Get client IP Address
 */
function getClientIP(){
	if (getenv('HTTP_CLIENT_IP')) {
		$clientIP = getenv('HTTP_CLIENT_IP');
	} elseif (getenv('HTTP_X_FORWARDED_FOR')) {
		$clientIP = getenv('HTTP_X_FORWARDED_FOR');
	} elseif (getenv('REMOTE_ADDR')) {
		$clientIP = getenv('REMOTE_ADDR');
	} else {
		$clientIP = $HTTP_SERVER_VARS['REMOTE_ADDR'];
	}

	return $clientIP;
}


/**
 * Is visitor a spider ?
 */
function isSpider(){

	if (empty($_SERVER['HTTP_USER_AGENT'])) {
		return '';
	}

	$searchengine_bot = array(
		'googlebot',
		'mediapartners-google',
		'baiduspider+',
		'msnbot',
		'yodaobot',
		'yahoo! slurp;',
		'yahoo! slurp china;',
		'iaskspider',
		'sogou web spider',
		'sogou push spider'
	);

	$searchengine_name = array(
		'GOOGLE',
		'GOOGLE ADSENSE',
		'BAIDU',
		'MSN',
		'YODAO',
		'YAHOO',
		'Yahoo China',
		'IASK',
		'SOGOU',
		'SOGOU'
	);

	$spider = strtolower($_SERVER['HTTP_USER_AGENT']);

	foreach ($searchengine_bot AS $key => $value) {
		if (strpos($spider, $value) !== false) {
			$spider = $searchengine_name[$key];

			return $spider;
		}
	}

	return '';
}


/**
 *  Get user broswer type
 */
function getUserAgent() {
	if (empty($_SERVER['HTTP_USER_AGENT'])) {
		return '';
	}

	$browser = $browser_ver = '';
	$agent = $_SERVER['HTTP_USER_AGENT'];

	if (preg_match('/MSIE\s([^\s|;]+)/i', $agent, $regs)) {
		$browser = 'Internet Explorer';
		$browser_ver = $regs[1];
	} elseif (preg_match('/FireFox\/([^\s]+)/i', $agent, $regs)) {
		$browser = 'FireFox';
		$browser_ver = $regs[1];
	} elseif (preg_match('/Opera[\s|\/]([^\s]+)/i', $agent, $regs)) {
		$browser = 'Opera';
		$browser_ver = $regs[1];
	} elseif (preg_match('/Netscape([\d]*)\/([^\s]+)/i', $agent, $regs)) {
		$browser = 'Netscape';
		$browser_ver = $regs[2];
	} elseif (preg_match('/safari\/([^\s]+)/i', $agent, $regs)) {
		$browser = 'Safari';
		$browser_ver = $regs[1];
	} elseif (preg_match('/NetCaptor\s([^\s|;]+)/i', $agent, $regs)) {
		$browser = '(Internet Explorer ' . $browser_ver . ') NetCaptor';
		$browser_ver = $regs[1];
	}

	if (!empty($browser)) {
		return addslashes($browser . ' ' . $browser_ver);
	} else {
		return 'Unknow browser';
	}
}


/**
 *  Get user OS
 */
function getUserOS() {
	if (empty($_SERVER['HTTP_USER_AGENT'])) {
		return 'Unknown';
	}

	$os = '';
	$agent = strtolower($_SERVER['HTTP_USER_AGENT']);

	if (strpos($agent, 'win') !== false) {
		if (strpos($agent, 'nt 5.1') !== false) {
			$os = 'Windows XP';
		} elseif (strpos($agent, 'nt 5.2') !== false) {
			$os = 'Windows 2003';
		} elseif (strpos($agent, 'nt 5.0') !== false) {
			$os = 'Windows 2000';
		} elseif (strpos($agent, 'nt 6.0') !== false) {
			$os = 'Windows Vista';
		} elseif (strpos($agent, 'nt') !== false) {
			$os = 'Windows NT';
		}
	} elseif (strpos($agent, 'linux') !== false) {
		$os = 'Linux';
	} elseif (strpos($agent, 'mac') !== false && strpos($agent, 'pc') !== false) {
		$os = 'Macintosh';
	} else {
		$os = 'Unknown';
	}

	return $os;
}


/**
 *  Submit HTTP request via CURL
 */
function httpRequest($url, $params, $timeout = 0) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_FAILONERROR, FALSE);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);

	/**
	 *  Post ?
	 */
	if (is_array($params) && sizeof($params) > 0) {
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
	}

	$response = curl_exec($ch);

	if (curl_errno($ch)) {
		throw new Exception(curl_error($ch), 0);
	}

	curl_close($ch);
	return $response;
}


/**
 *  Submit HTTP request via CURL
 */
function executeHTTPRequest($url, $params, $timeout = 0, $header = '') {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	if($header=='json'){
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json; charset=utf-8',
			'Content-Length: ' . strlen($params)
		));
	}
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_FAILONERROR, FALSE);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
	
	/*if (is_array($params) && sizeof($params) > 0) {
		$postBodyString = '';
		foreach ($params as $key => $value) {
			$postBodyString .= "$key=" . urlencode($value) . '&';
		}
		unset($key, $value);
		curl_setopt($ch, CURLOPT_POSTFIELDS, substr($postBodyString, 0, -1));
	}*/

	$response = curl_exec($ch);

	if (curl_errno($ch)) {
		throw new Exception(curl_error($ch), 0);
	}

	curl_close($ch);
	return $response;
}


/******无限循环******/
function cate_child($catename,$pid=0){
	$tree = array();
	foreach($catename as $catek => $catev){
		if($catev['pid'] == $pid){
			$tree[$catek]=$catev;
			$tree[$catek]['childname']=cate_child($catename,$catev['id']);
		}
	}
	return $tree;
}

//递归调用
function get_tree($volist,$nan=0,$html='──',$level=0) {
	$arr=array();
	foreach($volist as $val) {
		if ($val['p_id'] == $nan) {
			$nbsp="&nbsp;";
			$j="&nbsp;";
			$val['name'] = $val['name'];
			$val['html'] = str_repeat($html,$level).$j;
			$arr[] = $val;
			$arr = array_merge($arr,get_tree($volist,$val['id'],$html,$level+1));
		}
	}
	
	return $arr;
}


/*******随机生成四位数********/
function GetRandStr($len){   
	$chars = array(   
		"A", "B", "C", "D", "E", "F", "G",    
		"H", "J", "K", "L", "M", "N", "P", "Q", "R",    
		"S", "U", "V", "W", "X", "Y", "Z"
	);   
	$charsLen = count($chars) - 1;   
	shuffle($chars);     
	$output = "";   
	for ($i=0; $i<$len; $i++)   
	{   
		$output .= $chars[mt_rand(0, $charsLen)];   
	}    
	return $output;    
}

/*********计算时间差**************/
function format_date($time){
	$t=time()-$time;
	$f=array(
		'31536000'=>'年',
		'2592000'=>'个月',
		'604800'=>'星期',
		'86400'=>'天',
		'3600'=>'小时',
		'60'=>'分钟',
		'1'=>'秒'
	);
	foreach ($f as $k=>$v)    {
		if (0 !=$c=floor($t/(int)$k)) {
			return $c.$v.'前';
		}
	}
}

/******订单号******/
function oddnumbers($lenth){
	$order_id_main = rand(10000000,99999999);
	//订单号码主体长度
	//$order_id_len = strlen($order_id_main);
	$order_id_sum = 0;
	for($i=0; $i<$lenth; $i++){
		$order_id_sum += (int)(substr($order_id_main,$i,1));
	}
	
	//唯一订单号码（YYYYMMDDHHIISSNNNNNNNNCC）
	$order_id = date('Ymd').$order_id_sum . str_pad((100 - $order_id_sum % 100) % 100,2,'0',STR_PAD_LEFT);
	return $order_id;
}

/**
 *  邮件发送函数
 *  @param  string  $toMail     接收者邮箱
 *  @param  string  $msg       邮件内容
 *  @return string  $message    发送成功或失败消息
 */
function sendMail($toMail,$msg='') {
	$ip=getClientIP();
	$clientip=getcposition($ip);
	$suffix=explode('@',$toMail);
	$maillist=array('163.com','126.com','sina.com','sina.cn','qq.com');
	
	if($clientip['data']['country_id']=='CN'){
		$smtp='smtp.exmail.qq.com';
	}else{
		if(in_array($suffix[1],$maillist)){
			$smtp='smtp.exmail.qq.com';
		}else{
			$smtp='hw.smtp.exmail.qq.com';
		}
		$smtp='hwsmtp.exmail.qq.com';
	}
	
	Yaf_loader::import(LIB_PATH . '/PHPMailer/src/Exception.php');
	Yaf_loader::import(LIB_PATH . '/PHPMailer/src/PHPMailer.php');
	Yaf_loader::import(LIB_PATH . '/PHPMailer/src/SMTP.php');
	$mail = new \PHPMailer\PHPMailer\PHPMailer;
	$mail->SMTPDebug = 1;
	$mail->isSMTP();
	$mail->SMTPAuth = true; 
	$mail->Host = $smtp;
	$mail->SMTPSecure = 'ssl';
	$mail->Port = 465;
	$mail->CharSet = 'UTF-8';
	$mail->FromName = 'Acute Angle Foundation.';
	$mail->Username = 'dev@acuteangle.com';
	$mail->Password = 'ckB76EnChVHpDX6u';
	$mail->From = 'dev@acuteangle.com';
	$mail->isHTML(true);
	$mail->addAddress("{$toMail}");
	//$mail->addAddress("s934989719@163.com");
	$mail->Subject = 'Acute Angle';
	$mail->Body = "<h1>{$msg}</h1>";
	//$mail->addAttachment('./example.pdf');
	$status = $mail->send();
	return $status;
}

function getcposition($ip){
	try {
		$res1 = file_get_contents("http://ip.taobao.com/service/getIpInfo.php?ip=$ip");
		$res1 = json_decode($res1,true);
		
		if ($res1[ "code"]==0){
			return $res1;
		}else{
			return false;
		} 
	}catch (Exception $e){
		return false;
	}
}
