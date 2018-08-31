<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午9:48
 */
class M_Walletuser extends Model {
    function __construct() {
        $this->table = 'AAC_Mac';
        $this->primary = 'aac_id';
        parent::__construct();
    }
	
    public function getMacByPage($pageSize=10,$current=1,$sort,$like,$where){
        $field = array('aac_id','aac_macAddress','aac_name','aac_loginPassword','aac_status');
        return $this->Field($field)->tabPage($pageSize,$current,$sort,$like,$where);
    }
	
}