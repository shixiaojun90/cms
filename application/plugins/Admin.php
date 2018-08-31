<?php

class AdminPlugin extends Yaf_Plugin_Abstract {

    public function checkLogin(){
        $adminID = Yaf_Session::getInstance()->__get('user')['id'];
        if(!$adminID){
            jsRedirect('/admin/login');
        }
    }

    public function checkUser(){
        $adminID = Yaf_Session::getInstance()->__get('user')['id'];
        if(!$adminID){
            if(!$_GET['type']=='preview') {
                jsRedirect('/statics/index/index.html');
            }
        }
        return false;
    }

}