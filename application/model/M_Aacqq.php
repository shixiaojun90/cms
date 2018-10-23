<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午9:48
 */
class M_Aacqq extends Model {
    function __construct() {
        $this->table = TB_PREFIX.'aacuser';
        parent::__construct();
    }

   
    public function getAppemailPage($pageSize=10,$current=1,$sort,$like,$where){
        $field = array('id','qq','moneyadd','aacmoney','link','recommend','logins','c_time');
        return $this->Field($field)->tabPage($pageSize,$current,$sort,$like,$where);
    }
	
	public function getArticlebyId($id){
        $where=array('id'=>$id);
        return $this->where($where)->SelectOne();
    }
	
	public function getArticlebyqq($qq){
        $where=array('qq'=>$qq);
        return $this->where($where)->SelectOne();
    }
	
	/*******导出excel*******/
    public function excelqq(){
    	$data=$this->Query($sql="select * from aa_aacuser");
		
		return $data;
    }
	
}