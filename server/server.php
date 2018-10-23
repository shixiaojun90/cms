<?php
/**
 * Created by PhpStorm.
 * User: 27394
 * Date: 2017/4/21
 * Time: 15:26
 */
//创建websocket服务器对象，监听0.0.0.0:8083端口

ini_set("display_errors", "On");
include("SwooleMysql.php");
class SwooleServer{
	private $table;
	public static $instance;
	private $server;
	
	public function __construct() {
		$this->table = new swoole_table(1024);
		$this->table->column('id', swoole_table::TYPE_INT, 8);      //1,2,4,8
		$this->table->create();
		
		$this->server = new swoole_websocket_server('0.0.0.0','8083');
		$this->server->set(
			array(
				'daemonize' => true
			)
		);
		
		$this->server->on('Open',array($this , 'onOpen'));
		$this->server->on('Message',array($this , 'onMessage'));
		$this->server->on('Close',array($this , 'onClose'));
		$this->server->start();
	}
	
	
	public function onOpen($server, $request) {
		$client=SwooleMysql::checkfd($request->fd);
		if(empty($client) || $client == ""){
			SwooleMysql::setfd($request->fd);
			$fd=SwooleMysql::checkfd($request->fd);
		}else{
			$fd=SwooleMysql::checkfd($request->fd);
		}
		
		//$fddata=SwooleMysql::getfd();
		$nums=SwooleMysql::getjsongroup();
		$data=json_decode($nums,true);
		
		$this->server->push($fd['fd'],$data['nums']);
		
		$tmpuser=array(
		 	'id' =>$request->fd
		);
		
		//$this->table->set($request->fd,array('id'=>$request->fd));
	}
	
	public function onMessage($server, $frame) {
		$fddata=SwooleMysql::getfd();
		$nums=SwooleMysql::getjsongroup();
		$data=json_decode($nums,true);
		for($i=0; $i<count($fddata); $i++){
			$this->server->push($fddata[$i]['fd'],$data['nums']);
		}
		
		/**
		if(!empty($this->table)){
			foreach($this->table as $val){
				if($val['id']){
					$this->server->push($val['id'],$data['nums']);
				}
			}
		}
		**/
		
	}
	
	
	public function onClose($server, $fd) {
		$fddata=SwooleMysql::delfd($fd);
		//$this->table->del($fd);
		//echo "客户端-{$fd} 断开连接\n";
		unset($fd);// 清除 已经关闭的客户端
		
	}
	
	public static function getInstance() {
		if (!self::$instance) {
			self::$instance = new SwooleServer;
		}
		return self::$instance;
	}
}

SwooleServer::getInstance();