<?php

class M_Role extends Model {

	function __construct() {
		$this->table = TB_PREFIX.'role';
		$this->primary = 'id';
		parent::__construct();
	}

	// 根据 roleID 获取权限
	public function getPermissiongeByRoleID($roleID){
        $field = array('id','group_id','role_name','permission');
		return $this->SelectByID($field, $roleID);
	}

    /**获取所有用户
     * @return records
     */
    public function getRoleListByPage($pageSize=10,$current=1,$sort,$like){
        $field = array('id','group_id','role_name');
        return $this->Field($field)->tabPage($pageSize,$current,$sort,$like);
    }
	

	// 更新 roleID 权限
	public function updatePermissionByRoleID($arr,$roleID){
		$m = array('permission' => serialize($arr['permission']),'role_name'=>$arr['role_name'],'group_id'=>$arr['group_id']);
		return $this->UpdateByID($m, $roleID);
	}


}