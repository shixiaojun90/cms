<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午9:48
 */
class M_Banner extends Model {
    function __construct() {
        $this->table = TB_PREFIX.'banner';
        parent::__construct();
    }

    public function getArtListByPage($pageSize=10,$current=1,$sort,$like,$where){
        $field = array('id','img','link','c_time','creater','sort');
        return $this->Field($field)->tabPage($pageSize,$current,$sort,$like,$where);
    }

    public function getAppArtListByPage($pageSize=10,$current=1,$sort,$like,$where){
        $field = array('id','img','link','c_time','creater','sort');
		
        return $this->Field($field)->tabPage($pageSize,$current,$sort,$like,$where);
    }


    public function getArticlebyId($id){
        $where=array('id'=>$id);
        return $this->where($where)->SelectOne();
    }

    public function getBannerImg(){
        $field = array('img');
        return $this->Field($field)->Select();
    }
}
