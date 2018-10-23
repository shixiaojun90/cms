<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午9:48
 */
class M_Aacmoney extends Model {
    function __construct() {
        $this->table = TB_PREFIX.'aacuser';
        parent::__construct();
    }

    public function getArtListByPage($pageSize=10,$current=1,$sort,$like,$where){
        $field = array('id','tel','moneyadd','okexmoney','c_time');
        return $this->Field($field)->tabPage($pageSize,$current,$sort,$like,$where);
    }


    public function getUserById($id){
        $field = array('id','tel','moneyadd','okexmoney','c_time');
        $where=array('id'=>$id);
        return $this->Field($field)->where($where)->SelectOne();
    }
	
	public function getUserBytel($tel){
        $field = array('id','tel','moneyadd','okexmoney','c_time');
        $where=array('tel'=>$tel);
        return $this->Field($field)->where($where)->SelectOne();
    }
	
	public function getidentifying($identifying){
		$field = array('id','tel','moneyadd','okexmoney','c_time');
        $where=array('identifying'=>$identifying);
        return $this->Field($field)->where($where)->SelectOne();
    }
}