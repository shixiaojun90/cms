<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午9:48
 */
class M_Enaac extends Model {
    function __construct() {
        $this->table = TB_PREFIX.'en_aac';
        parent::__construct();
    }

    public function getArtListByPage($pageSize=10,$current=1,$sort,$like,$where){
        $field = array('id','name','title','keywords','icon','nstatus','status','count','creater','verifyer','u_time','c_time','v_time','level','setting');
        return $this->Field($field)->tabPage($pageSize,$current,$sort,$like,$where);
    }

    public function getAppArtListByPage($pageSize=10,$current=1,$sort,$like,$where){
        $field = array('id','name','title','keywords','icon','nstatus','status','count','creater','verifyer','content','u_time','c_time','v_time','level','setting');
        return $this->Field($field)->tabPage($pageSize,$current,$sort,$like,$where);
    }


    public function getArticlebyId($id){
        $where=array('id'=>$id);
        return $this->where($where)->SelectOne();
    }
}