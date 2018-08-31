<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午9:48
 */
class M_Actlog extends Model {
    function __construct() {
        $this->table = TB_PREFIX.'integral_log';
        $this->primary = 'id';
        parent::__construct();
    }
	
    public function getMacByPage($pageSize=10,$current=1,$sort,$like,$where){
        $field = array('id','uid','wtype','action','c_time','info');
        return $this->Field($field)->tabPage($pageSize,$current,$sort,$like,$where);
    }
	
}