<?php

class LoginController extends BasicController {

    private $m_role;
    private $m_user;
    private $m_menu;

    private function init(){
        session_unset('user');
        session_start();
        $this->m_user = $this->load('User');
        $this->m_role  = $this->load('Role');
        $this->m_menu  = $this->load('Menu');
        $this->homeUrl = '/admin/login';
    }

    public function indexAction(){

    }

    public function checkLoginAction(){
        $username = $this->getPost('username');
        $password = $this->getPost('password');
        $captcha  = $this->getPost('captcha');
        if(!$username || !$password){
            Helper::response('1002');
            if(ENV != 'DEV'){
                if(!$captcha){
                    Helper::response('1002');
                }
            }
        }

        if(ENV != 'DEV'){
            if(strtolower($captcha) != strtolower($_SESSION['adminCaptcha'])){
                Helper::response('1200');
            }
        }
        // 管理员登陆
        $data = $this->m_user->checkLogin($username, $password);

        if(!$data){
            // Login fail
            $log['status'] = 0;
            Helper::response('1201');
        }else{
            // admin 拥有所有的权限
            if($data['status']=='1'){
                Helper::response('1202');
            }
            $menus=$this->m_menu->getMenusByRole($data['role']);
            $permission=$this->m_role->getPermissiongeByRoleID($data['role'])['permission'];
            $userinfo=array('id'=>$data['id'],'username'=>$username,'role'=>$data['role'],'menu'=>$menus,'permission'=>$permission);
            if(unserialize($permission)['is_administortar']==1){
                $userinfo['global']=$this->load('global')->getGlobal();
                $userinfo['global']['permission']=unserialize($userinfo['global']['permission']);
            }
            $this->setSession('user', $userinfo);
            Helper::response(array('code'=>0,'msg'=>'success'));
        }
    }

    public function logoutAction(){
        $this->unsetSession('user');
        $this->goHome();
    }
}