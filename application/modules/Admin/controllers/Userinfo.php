<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 16/11/3
 * Time: 11:29
 */
class UserinfoController extends BasicController {
    private function init(){
        Yaf_Registry::get('adminPlugin')->checkLogin();
        Yaf_Registry::get('PermissionPlugin')->checkPermission(true);
        $this->m_role  = $this->load('role');
    }

    public function indexAction(){
        $field = array('id','group_id','role_name');
        $role=$this->m_role->Field($field)->Select();
        $this->getView()->assign(array('global'=>json_encode($_SESSION['user']['global']),'role'=>$role));
    }
    
    public function tabPageAction(){
        try{
            //查询
			$sort='id desc';
            $data=$this->load('User')->getUserListByPage($_POST['rowCount'],$_POST['current'],$sort,$_POST['searchPhrase']);
            
	    foreach ($data['data'] as $item=>$k){
                $roleinfo=$this->m_role->getPermissiongeByRoleID($k['role']);
                $data['data'][$item]['role']=$roleinfo['role_name'];
                switch ($k['status']){
                    case '0':
                        $data['data'][$item]['status']='正常';
                        break;
                    case '1':
                        $data['data'][$item]['status']='冻结';
                        break;
                }
            }
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }


    public  function getUserByIdAction(){
        try{
            //查询

            $data=$this->load('User')->getUserById($_GET['uid']);
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }

    public function updateUserByIdAction(){
        try{
            $salt=$this->load('User')->getSaltByLogin($_POST['data']['login']);

            if(!$salt){
                Yaf_Loader::import(FUNC_PATH.'/F_Password.php');
                $salt=fetch_salt(6);
                $_POST['data']['salt']=$salt;
            }
//            $rsa=new Rsa();
//            $password=$rsa->privDecrypt($_POST['data']['password']);
		//查询
            if($_POST['data']['password']){
            	 $_POST['data']['password']=sha1($salt.sha1($_POST['data']['password']));
	    }
            $data=$this->load('User')->updateUserById($_POST['data'],$_POST['uid']);
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }

    /**
     * Add new Userinfo
     */
    public function addAction(){
        try{
            Yaf_Loader::import(FUNC_PATH.'/F_Password.php');
            $salt=fetch_salt(6);
            $_POST['data']['salt']= $salt;
            $_POST['data']['password']= sha1($salt.sha1($_POST['data']['password']));
            $data=$this->load('User')->Insert($_POST['data']);
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
    /*
     * 获取用户个人信息
     */
    public function getUserinfoByUidAction(){
        try{
            $data=$this->load('userinfo')->getUserinfoById($_GET['uid']);
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }

    public function updateUserinfoByIdAction(){
        try{
            $ret=$_POST;
            unset($ret['id']);
            if(!$ret['avatar']){
                unset($ret['avatar']);
            }
            $data=$this->load('userinfo')->UpdateUserinfoByID($ret,$_POST['id']);
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
            $result = $this->load('User')->DeleteByID($_POST['uid']);
            Helper::response('0',$result);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
}
