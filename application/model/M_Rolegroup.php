<?php

class M_Rolegroup extends Model {

    function __construct() {
        $this->table = TB_PREFIX.'role_group';
        parent::__construct();
    }



    // 根据 roleID 获取权限
    public function getRoleGroupByID($Id){
        $field = array('id','group_name');
        return $this->SelectByID($field, $Id);
    }

    /**获取所有用户
     * @return records
     */
    public function getRoleGroupListByPage($pageSize=10,$current=1,$sort,$like){
        $field = array('id','group_name','c_time');
        return $this->Field($field)->tabPage($pageSize,$current,$sort,$like);
    }


    // 更新 roleID 权限
    public function updateRoleGroupByID($arr,$Id){
        $m = array('group_name'=>$arr['group_name']);
        return $this->UpdateByID($m, $Id);
    }
}