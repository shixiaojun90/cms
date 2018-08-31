<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午11:35
 */
class M_Audit extends Model {
    function __construct() {
        $this->table = TB_PREFIX.'audit';
        parent::__construct();
    }

    public function getAuditListByPage($pageSize=10,$current=1,$sort,$like,$where){
        $field = array('id','audit_type','audit_id','nstatus','c_time','v_time','uid','v_uid');
        $data=$this->Field($field)->tabPage($pageSize,$current,$sort,$like,$where);
        return $data;
    }

    public function getAuditbyId($id){
        $where=array('id'=>$id);
        return $this->where($where)->SelectOne();
    }
}