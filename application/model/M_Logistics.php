<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午9:48
 */
class M_Logistics extends Model {
    function __construct() {
        $this->table = TB_PREFIX.'logistics';
        parent::__construct();
    }

    public function getLogisticsPage($pageSize=10,$current=1,$sort,$like,$where){
        $field = array('id','oid','newaddress','newstatus','newtime');
        return $this->Field($field)->tabPage($pageSize,$current,$sort,$like,$where);
    }

    public function getLogisticsId($id){
        $where=array('id'=>$id);
        return $this->where($where)->SelectOne();
    }
	
	public function getLogisticsUid($uid){
        $where=array('uid'=>$uid);
        return $this->where($where)->Select();
    }
	
	public function getLogisticsOid($oid){
        $where=array('oid'=>$oid);
        return $this->where($where)->Select();
    }
}