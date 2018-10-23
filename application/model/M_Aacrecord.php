<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午9:48
 */
class M_Aacrecord extends Model {
    function __construct() {
        $this->table = TB_PREFIX.'record';
        parent::__construct();
    }

   
    public function getAppemailPage($pageSize=10,$current=1,$sort,$like,$where){
        $field = array('id','remark','c_time');
        return $this->Field($field)->tabPage($pageSize,$current,$sort,$like,$where);
    }
	
	
	/*******导出excel*******/
    public function excelrecord(){
    	$data=$this->Query($sql="select * from aa_record");
		
		return $data;
    }
	
}