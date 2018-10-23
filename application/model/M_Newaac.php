<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午9:48
 */
class M_Newaac extends Model {
    function __construct() {
        $this->table = TB_PREFIX.'newaac';
        parent::__construct();
    }

    public function getArtListByPage($pageSize=10,$current=1,$sort,$like,$where){
        $field = array('id','qq','moneyadd','newmoneyadd','logins','c_time');
        return $this->Field($field)->tabPage($pageSize,$current,$sort,$like,$where);
    }


    public function getUserById($id){
        $field = array('id','qq','recommend','aacmoney','link','access_token');
        $where=array('id'=>$id);
        return $this->Field($field)->where($where)->SelectOne();
    }
	
	public function getUserByQQ($qq){
        $field = array('id','qq','logins','moneyadd');
        $where=array('qq'=>$qq);
        return $this->Field($field)->where($where)->SelectOne();
    }
	
	public function getidentifying($identifying){
        $field = array('identifying','qq','logins','moneyadd');
        $where=array('identifying'=>$identifying);
        return $this->Field($field)->where($where)->SelectOne();
    }
	
	/*******导出excel*******/
    public function excelqq(){
    	$data=$this->Query($sql="select * from aa_newaac");
		
		return $data;
    }
}