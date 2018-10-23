<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午9:48
 */
class M_Quantity extends Model {
    function __construct() {
        $this->table = TB_PREFIX.'quantity';
        parent::__construct();
    }

    
	
	public function getquantity($type){
        $field = array('id','type','quantity');
        $where=array('type'=>$type);
        return $this->Field($field)->where($where)->SelectOne();
    }
}