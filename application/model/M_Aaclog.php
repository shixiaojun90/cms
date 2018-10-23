<?php

class M_Aaclog extends Model {
    function __construct() {
        $this->table = TB_PREFIX.'aaclog';
        parent::__construct();
    }

    

    public function getOrderListByPage($pageSize=10,$current=1,$sort,$like,$where){
        $field = array('id','order_id','uid','text','c_time');
        //$field = array('id','uid','bname','price','total','nums','modeinfo','order_id','username','tel','address','status','c_time','ip');

        return $this->Field($field)->tabPage($pageSize,$current,$sort,$like,$where);
    }
	
	
	//查询交易hash
	public function getlog($uid){
		$where=array('uid'=>$uid);
        return $this->where($where)->Select();
	}

	
}
