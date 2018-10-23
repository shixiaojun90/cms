<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午9:48
 */
class M_Register extends Model {
    function __construct() {
        $this->table = TB_PREFIX.'register';
        parent::__construct();
    }

    public function getArtListByPage($pageSize=10,$current=1,$sort,$like,$where){
        $field = array('id','email','username','status','access_token','c_time','limits','ip');
        return $this->Field($field)->tabPage($pageSize,$current,$sort,$like,$where);
    }


    public function getUserByname($email){
		//查找邮箱
        $field = array('id','email','username','salt','password');
        $where=array('email'=>$email);
        return $this->Field($field)->where($where)->SelectOne();
    }
	
	public function getUserByuser($username){
		//查找用户名
        $field = array('id','email','username','salt','password','limits');
        $where=array('username'=>$username);
        return $this->Field($field)->where($where)->SelectOne();
    }
	
	public function getUserById($id){
        $field = array('id','email','username','access_token','limits');
        $where=array('id'=>$id);
        return $this->Field($field)->where($where)->SelectOne();
    }
}