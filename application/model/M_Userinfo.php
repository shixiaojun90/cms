<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/3/20
 * Time: 上午10:44
 */
class M_Userinfo extends Model
{

    function __construct()
    {
        $this->table = TB_PREFIX . 'user_info';
        parent::__construct();
    }

    /**根据用户id获取用户信息
     * @return records
     */
    public function getUserinfoById($uid){
        $field = array('sex','birthday','user_name','avatar','uid','id','balance','desc');
        $where=array('uid'=>$uid);
        return $this->Field($field)->where($where)->SelectOne();
    }

    /**根据用户id修改用户信息
     * @param $arr
     * @param $uid
     * @return FALSE
     */
    public function UpdateUserinfoByID($arr,$id){
        return $this->UpdateByID($arr,$id);
    }

}