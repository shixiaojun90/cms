<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/3/13
 * Time: 下午2:55
 */

class M_User extends Model {

    function __construct() {
        $this->table = TB_PREFIX.'user';
		$this->primary = 'id';
        parent::__construct();
    }

    /**
     * Check admin login
     *
     * @param string $login
     * @return string $password
     * @return 1 on success or 0 or failure
     */
    public function checkLogin($login, $password){
        $field = array('id','role','status');
        $salt=$this->getSaltByLogin($login);
        $rsa=new Rsa();
        $password=$rsa->privDecrypt($password);
        $where = array('login' => $login, 'password' => sha1($salt.sha1($password)));
        return $this->Field($field)->Where($where)->SelectOne();
    }

    public function getSaltBylogin($login){
        return $this->Field(array('salt'))->Where(array('login'=>$login))->SelectOne()['salt'];
    }

    /**获取所有用户
     * @return records
     */
    public function getUserListByPage($pageSize=10,$current=1,$sort,$like){
        $field = array('id','login','status','role');
        return $this->Field($field)->tabPage($pageSize,$current,$sort,$like);
    }	

    /**根据用户id获取用户信息
     * @param $uid
     * @return records
     */
    public function getUserById($uid){
        $field = array('id','login','status','role');
        $where=array('id'=>$uid);
        return $this->Field($field)->where($where)->SelectOne();
    }

    /**根据用户name获取用户信息
     * @param $uid
     * @return records
     */
    public function getUserByName($login){
        $field = array('id','login','status');
        $where=array('login'=>$login);
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

    /** 验证token是否存在
     * @param $token
     * @return int
     */
    public function checkToken($token){
        $field = array('id');
        $where = array('access_token' => $token);
        $data=$this->Field($field)->Where($where)->SelectOne();
        return $data?1:0;
    }

    public function countByDays($begin,$end,$dateType='day'){
        switch ($dateType){
            case 'day':
                $data=$this->Query("select unix_timestamp(DATE_FORMAT(FROM_UNIXTIME(`c_time`),'%Y%m%d')) days,count(`id`) count from `hb_userlogin` where `c_time`<=$end and `c_time`>=$begin group by days");
                break;
            case 'month':
                $data=$this->Query("select unix_timestamp(DATE_FORMAT(FROM_UNIXTIME(`c_time`),'%Y%m')) months,count(`id`) count from `hb_userlogin` where `c_time`<=$end and `c_time`>=$begin group by months");
                break;
            case 'week':
                $data=$this->Query("select DATE_FORMAT(FROM_UNIXTIME(`c_time`),'%u') weeks,count(`id`) count from `hb_userlogin` where `c_time`<=$end and `c_time`>=$begin group by weeks");
                break;
            case 'hour':
                $data=$this->Query("select DATE_FORMAT(FROM_UNIXTIME(`c_time`),'%H') hours,count(`id`) count from `hb_userlogin` where `c_time`<=$end and `c_time`>=$begin group by hours");
                break;
        }
        return $data;
    }
}
