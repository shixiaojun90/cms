<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午9:48
 */
class M_Email extends Model {
    function __construct() {
        $this->table = TB_PREFIX.'email';
        parent::__construct();
    }

   
    public function getAppemailPage($pageSize=10,$current=1,$sort,$like,$where){
        $field = array('id','email','host','c_time');
        return $this->Field($field)->tabPage($pageSize,$current,$sort,$like,$where);
    }
	
	/*******验证email*******/
    public function getEmail($email){
    	$data=$this->Query($sql="select * from aa_email where email= '".$email."'");
		
		return $data;
    }
	/*******导出excel*******/
    public function excelEmail(){
    	$data=$this->Query($sql="select * from aa_email");
		
		return $data;
    }
	
}