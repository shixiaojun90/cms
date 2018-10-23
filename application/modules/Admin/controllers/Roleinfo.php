<?php

class RoleinfoController extends BasicController {
	
	private $m_role;

	private function init(){
		Yaf_Registry::get('adminPlugin')->checkLogin();
        Yaf_Registry::get('PermissionPlugin')->checkPermission(true);
        $this->m_role  = $this->load('Role');
        $this->m_role_group  = $this->load('Rolegroup');
        $this->homeUrl = '/admin/roleinfo';
	}
	
	/**
	 *  Index : list all roles
	 */
	public function indexAction(){
        $roleGroup=$this->m_role_group->Select();
        $this->getView()->assign(array('global'=>json_encode($_SESSION['user']['global']),'rolegroup'=>$roleGroup));
	}

    public function tabPageAction(){
        try{
            //查询
			$sort='id desc';
            $data=$this->load('Role')->getRoleListByPage($_POST['rowCount'],$_POST['current'],$sort,$_POST['searchPhrase']);
            $roleGroup=$this->m_role_group->Select();

            foreach ($data['data'] as $item=>$k){
                foreach ($roleGroup as $i=>$key){
                    if($k['group_id']==$key['id']){
                        $data['data'][$item]['group_name']=$roleGroup[$i]['group_name'];
                    }
                }
                $data['data'][$item]['permission']=unserialize($data['data'][$item]['permission']);
            }
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }

    public  function getRoleinfoByIdAction(){
        try{
            //查询
            $data=$this->load('Role')->getPermissiongeByRoleID($_GET['roleId']);
            $data['permission']=unserialize($data['permission']);
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }


    public function updatePermissionByRoleIDAction(){
        try{
            $data=$this->load('Role')->updatePermissionByRoleID($_POST['data'],$_POST['roleId']);
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
	
	
	/**
	 * Add new roleinfo
	 */
	public function addAction(){
        try{
            $_POST['data']['permission']=serialize($_POST['data']['permission']);
            $data=$this->m_role->Insert($_POST['data']);
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
	}


	
	/**
	 * Delete
	 */
	public function deleteAction(){
        try{
		    $result = $this->m_role->DeleteByID($_POST['roleId']);
            Helper::response('0',$result);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
	}
}