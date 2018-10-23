<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午9:48
 */
class M_Record extends Model {
    function __construct() {
        $this->table = TB_PREFIX.'record';
        parent::__construct();
    }

    public function getArtListByPage($pageSize=10,$current=1,$sort,$like,$where){
        $field = array('id','remark','aacmoney','recommend','uid','c_time');
        return $this->Field($field)->tabPage($pageSize,$current,$sort,$like,$where);
    }


    public function getUserById($uid){
        $field = array('id','remark','aacmoney','recommend','userid');
        $where=array('id'=>$uid);
        return $this->Field($field)->where($where)->SelectOne();
    }
	
	
}