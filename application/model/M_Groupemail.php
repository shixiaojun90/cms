<?php
class M_Groupemail extends Model {
    function __construct() {
        $this->table = TB_PREFIX.'groupemail';
        parent::__construct();
    }
	
    /**
     * 根据id获取一条订单信息
     */
    public function emailinfo(){
        //$where=array('id'=>$id);
        return $this->SelectOne();
    }
	
	public function getoptions($options){
        $where=array('options'=>$options);
        return $this->where($where)->SelectOne();
    }
	
	public function getname($name){
        $where=array('name'=>$name);
        return $this->where($where)->SelectOne();
    }
}