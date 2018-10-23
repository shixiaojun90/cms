<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午9:48
 */
class M_Emailcode extends Model {
    function __construct() {
        $this->table = TB_PREFIX.'email_code';
        parent::__construct();
    }

   
    public function getAppemailPage($pageSize=10,$current=1,$sort,$like,$where){
        $field = array('id','email','code','c_time');
        return $this->Field($field)->tabPage($pageSize,$current,$sort,$like,$where);
    }
	
	public function getemailbycode($code){
		$field = array('id','email','code','c_time');
        $where=array('code'=>$code);
        return $this->where($where)->SelectOne();
    }
	
	
}