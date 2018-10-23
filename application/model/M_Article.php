<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午9:47
 */
class M_Article extends Model {
    function __construct() {
        $this->table = TB_PREFIX.'article';
        parent::__construct();
    }

    public function getArtListByPage($pageSize=10,$current=1,$sort,$like){
        $field = array('id','name','title','icon','c_time','u_time','uid');
        return $this->Field($field)->tabPage($pageSize,$current,$sort,$like);
    }

    public function getArticlebyId($id){
        $where=array('id'=>$id);
        return $this->where($where)->SelectOne();
    }
}