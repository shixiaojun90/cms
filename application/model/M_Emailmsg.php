<?php
class M_Emailmsg extends Model {
    function __construct() {
        $this->table = TB_PREFIX.'emailmsg';
        parent::__construct();
    }
	
    /**
     * 根据id获取一条订单信息
     */
    public function emailinfo(){
		$where=array("status"=>"0");
        return $this->where($where)->Select();
    }
	
	public function getemailByid($id){
		$where=array("id"=>$id,"status"=>"0");
        return $this->where($where)->SelectOne();
    }
	
}