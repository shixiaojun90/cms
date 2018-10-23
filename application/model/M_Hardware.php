<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 下午12:02
 */
class M_Hardware extends Model {
    function __construct() {
        $this->table = TB_PREFIX.'hardware';
        parent::__construct();
    }

    public function getHardWareListByPage($pageSize=10,$current=1,$sort,$like,$where){
        return $this->tabPage($pageSize,$current,$sort,$like,$where);
    }


    public function getHardwareById($id){
        $where=array('id'=>$id);
        return $this->where($where)->SelectOne();
    }
}