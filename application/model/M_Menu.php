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
		$this->primary = 'id';
        parent::__construct();
    }
    
    
    public function getNavPage($pageSize=10,$current=1,$sort,$like,$where){
    	$field = array('id','name','icon','url','p_id','level','c_time','uid','role');
    	return $this->Field($field)->tabPage($pageSize,$current,$sort,$like,$where);
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
    
    /**根据分组的id获取关联的菜单
     * @param $role 权限
    * @return records 菜单
    */
    public function getNavmenu($id){
    	$data=$this->Where(array('id'=>$id))->SelectOne();
    	 
    	return $data;
    }
    
    /**根据分组的id获取关联的菜单
     * @param $role 权限
    * @return records 菜单
    */
    public function getRolelist($uid){
    	$field = array('id','name','url','p_id','level','icon');
    	$data=$this->Field($field)->Where('uid','=',$uid)->Order(array('level'=>'asc'))->Select();
    	
    	return $data;
    }
    
    /****获取menu菜单列表*****/
    public function getMenulist(){
    	$data=$this->Select();
    	return $data;
    }
}