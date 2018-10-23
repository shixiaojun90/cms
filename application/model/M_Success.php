<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午11:50
 */
class M_Success extends Model {
    function __construct() {
        $this->table = TB_PREFIX.'success';
        parent::__construct();
    }

    public function getSuccessListByPage($pageSize=10,$current=1,$sort,$like,$where){
        $field = array('static_url','id','name','title','keywords','content','icon','nstatus','status','count','creater','verifyer','u_time','c_time','v_time','level');
        return $this->Field($field)->tabPage($pageSize,$current,$sort,$like,$where);
    }

    public function getAppSuccessListByPage($pageSize=10,$current=1,$sort,$like,$where){
        $field = array('id','name','static_url','title','keywords','icon','nstatus','status','count','creater','verifyer','u_time','c_time','v_time','level');
        return $this->Field($field)->tabPage($pageSize,$current,$sort,$like,$where);
    }

    public function getSuccessById($id){
        $where=array('id'=>$id);
        return $this->where($where)->SelectOne();
    }
}