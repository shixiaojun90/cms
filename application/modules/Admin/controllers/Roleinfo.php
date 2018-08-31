<?php

class RoleinfoController extends BasicController {
	
	private $m_role;

	private function init(){
		Yaf_Registry::get('adminPlugin')->checkLogin();
        Yaf_Registry::get('PermissionPlugin')->checkPermission(true);
        $this->m_role  = $this->load('Role');
        $this->m_role_group  = $this->load('Rolegroup');
        $this->m_menu  = $this->load('Menu');
        $this->homeUrl = '/admin/roleinfo';
        $this->m_setting=$this->load('setting');
        $this->globar=Yaf_Registry::get('GlobarPlugin')->getArray_key($this->m_setting->getoptions(),'name');
	}
	
	/**
	 *  Index : list all roles
	 */
	public function indexAction(){
		//print_r($this->getsession('user')['permission']);exit;
        $roleGroup=$this->m_role_group->Select();
        $this->getView()->assign(array('global'=>json_encode($_SESSION['user']['global']),'rolegroup'=>$roleGroup));
        $this->getView()->assign(array('offset'=>$this->globar['offset']['value']));
        $rolefile=require_once(MENU_PATH.'/act.inc.php');
        $this->getView()->assign(array('rolefile'=>$rolefile));
	}

    public function tabPageAction(){
        try{
            //查询
        	empty($_POST['current']) ? $params['current']='1' : $params['current']=$_POST['current'];
        	empty($_POST['rowCount']) ? $params['rowCount']=$this->globar['offset']['value'] : $params['rowCount']=$_POST['rowCount'];
			$sort='id desc';
            $data=$this->load('Role')->getRoleListByPage($params['rowCount'],$params['current'],$sort,$_POST['searchPhrase']);
            
            
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }

    public  function getByIdAction(){
        try{
            //查询
            $data=$this->load('Role')->getPermissiongeByRoleID($_GET['roleId']);
           
            if(!empty($data['permission'])){
            	$data['permission']=unserialize($data['permission']);
            	unset($data['permission']['is_administortar']);
            }
            //print_r($data);
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }

	
    public function updateUserByIdAction(){
        try{
        	$post['role_name']=trim($_POST['role_name']);
        	$post['group_id']=trim($_POST['group_id']);
        	$_POST['permission']['is_administortar']='1';
        	$post['permission']=serialize($_POST['permission']);
            $data=$this->load('Role')->UpdateByID($post,$_POST['roleId']);
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
            $post['role_name']=trim($_POST['role_name']);
        	$post['group_id']=trim($_POST['group_id']);
        	$_POST['permission']['is_administortar']='1';
        	$post['permission']=serialize($_POST['permission']);
            $data=$this->m_role->Insert($post);
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