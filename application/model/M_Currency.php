<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午9:48
 */
class M_Currency extends Model {
    function __construct() {
        $this->table = TB_PREFIX.'currency';
        parent::__construct();
    }

		
    public function getAppArtListByPage($pageSize=10,$current=1,$sort,$like,$where){
        $field = array('id','bname','price','c_time','status','sort','ip','creater','paytarget');
        return $this->Field($field)->tabPage($pageSize,$current,$sort,$like,$where);
    }

		
    public function getArticlebyId($id){
        $where=array('id'=>$id);
        return $this->where($where)->SelectOne();
    }
	
	public function getBname($status){
		$field = array('id','bname','price','paytarget','sort');
		$where=array('status'=>$status);
        return $this->Field($field)->where($where)->Orderby('sort asc,id desc')->Select();
    }
	
	public function getnums($name){
		$field = array('id','bname','price','paytarget');
		$where=array('bname'=>$name,'status'=>0);
        return $this->Field($field)->where($where)->SelectOne();
    }
}