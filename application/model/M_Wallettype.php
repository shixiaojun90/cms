<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午9:48
 */
class M_Wallettype extends Model {
    function __construct() {
        $this->table = TB_PREFIX.'wallettype';
        $this->primary = 'id';
        parent::__construct();
    }
	
    public function gettypePage($pageSize=10,$current=1,$sort,$like,$where){
        $field = array('id','name','c_time');
        return $this->Field($field)->tabPage($pageSize,$current,$sort,$like,$where);
    }
	
}