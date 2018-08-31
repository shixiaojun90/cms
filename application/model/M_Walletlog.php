<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午9:48
 */
class M_Walletlog extends Model {
    function __construct() {
        $this->table = TB_PREFIX.'integral_log';
        parent::__construct();
    }

    public function getArtListByPage($pageSize=10,$current=1,$sort,$like,$where){
        $field = array('id','mac','act','current','c_time','zhtitle');
        return $this->Field($field)->tabPage($pageSize,$current,$sort,$like,$where);
    }

	
	public function getArticlebyId($id){
        $where=array('id'=>$id);
        return $this->where($where)->SelectOne();
    }
}