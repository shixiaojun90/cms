<?php
class SwooleMysql{
	public static $instance;
	public static $pdo;
	
	/*public function __construct() {
		try {
			self::$pdo = new PDO("mysql:host=pre-sale.cqawa4wevmoa.ap-southeast-1.rds.amazonaws.com;dbname=acuteangle", "root", "acuteangle123");
		}catch (PDOException $e) {  
			echo 'Connection failed: ' . $e->getMessage();  
		}
		self::$pdo->query('set names utf8;');
	}*/
	
	
	public static function getjsongroup(){
		//库存数量
		$pdo = new PDO("mysql:host=pre-sale.cqawa4wevmoa.ap-southeast-1.rds.amazonaws.com;dbname=acuteangle", "root", "acuteangle123");
		$sql = "select * from aa_setting where options='product'";
		$setting=$pdo->query($sql);
		$tingdata=$setting->fetch(PDO::FETCH_ASSOC);
		//print_r($tingdata);
		
		if(($tingdata['text']*40) > 0){
			$nums['nums']=intval($tingdata['text'])*40;
		}else{
			$nums['nums']=intval(0);
		}
		
		return json_encode($nums);
	}
	
	public static function setfd($fd){
		
		//库存数量
		$pdo = new PDO("mysql:host=pre-sale.cqawa4wevmoa.ap-southeast-1.rds.amazonaws.com;dbname=acuteangle", "root", "acuteangle123");
		$sql = "insert into aa_swoolefd (fd) values('".$fd."')";
		$fdid=$pdo->query($sql);
		
		if($fdid){
			return true;
		}else{
			return false;
		}
	}
	
	public static function getfd(){
		//库存数量
		$pdo = new PDO("mysql:host=pre-sale.cqawa4wevmoa.ap-southeast-1.rds.amazonaws.com;dbname=acuteangle", "root", "acuteangle123");
		$sql = "select * from aa_swoolefd";
		$fdquery=$pdo->query($sql);
		$fddata=$fdquery->fetchAll(PDO::FETCH_ASSOC);
		return $fddata;
	}
	
	public static function checkfd($fd){
		//库存数量
		$pdo = new PDO("mysql:host=pre-sale.cqawa4wevmoa.ap-southeast-1.rds.amazonaws.com;dbname=acuteangle", "root", "acuteangle123");
		$sql = "select * from aa_swoolefd where fd=".$fd;
		$fdquery=$pdo->query($sql);
		$fddata=$fdquery->fetch(PDO::FETCH_ASSOC);
		return $fddata;
	}
	
	public static function delfd($fd){
		//库存数量
		$pdo = new PDO("mysql:host=pre-sale.cqawa4wevmoa.ap-southeast-1.rds.amazonaws.com;dbname=acuteangle", "root", "acuteangle123");
		$sql = "delete from aa_swoolefd where fd=".$fd;
		$fdid=$pdo->query($sql);
		return $fdid;
	}
	
	
}


