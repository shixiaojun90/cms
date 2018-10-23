<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 16/11/2
 * Time: 16:30
 */
class M_Menu extends Model {

    function __construct() {
        $this->table = TB_PREFIX.'menu';
        parent::__construct();
    }

    /**根据权限获取菜单
     * @param $role 权限
     * @return records 菜单
     */
    public function getMenusByRole($role){
        $field = array('id','name','url','p_id','level','icon');
        $data=$this->Field($field)->Where('role','<=',$role)->Order(array('level'=>'asc'))->Select();
        foreach ($data as &$val){
            if($val['p_id']==0){
                $arr[$val['id']]['parent']=$val;
            }
        }
        foreach ($data as &$val){
            if($val['p_id']>0){
                $arr[$val['p_id']]['child'][]=$val;
            }
        }
        return $arr;
    }
}