<?php
/**
 * File: M_Admin.php
 * Functionality: Admin model
 * Author: Nic XIE
 * Date: 2013-5-8
 * Remark:
 */

class M_Admin extends Model {

	function __construct() {
		$this->table = TB_PREFIX.'admin';
		parent::__construct();
	}

	/**
	 * Check admin login 
	 *
	 * @param string $username
	 * @return string $password
	 * @return 1 on success or 0 or failure
	 */
	public function checkLogin($username, $password){
		$field = array('id','role','status');
		$where = array('username' => $username, 'password' => sha1($password));
		return $this->Field($field)->Where($where)->SelectOne();
	}

    /**获取所有用户
     * @return records
     */
    public function getUserListByPage($pageSize=10,$current=1,$sort,$like){
        $field = array('id','username','role','status');
        return $this->Field($field)->tabPage($pageSize,$current,$sort,$like);
    }

    /**根据用户id获取用户信息
     * @param $uid
     * @return records
     */
    public function getUserById($uid){
        $field = array('id','username','role','status');
        $where=array('id'=>$uid);
        return $this->Field($field)->where($where)->SelectOne();
    }

    /** 根据用户id修改用户信息
     * @param $arr
     * @param $uid
     * @return FALSE
     */
    public function updateUserById($arr,$uid){
        return $this->UpdateByID($arr,$uid);
    }
}