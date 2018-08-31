<?php
class M_Setting extends Model {
    function __construct() {
        $this->table = TB_PREFIX.'setting';
        parent::__construct();
    }
	
    /**
     * 根据id获取一条订单信息
     */
    public function getOrderInfobyId($id){
        $where=array('id'=>$id);
        return $this->where($where)->Select();
    }
	
	public function getoptions(){
        return $this->Select();
    }
	
	public function getname($name){
        $where=array('name'=>$name);
        return $this->where($where)->SelectOne();
    }
}