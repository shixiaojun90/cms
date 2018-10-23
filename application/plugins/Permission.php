<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 16/11/11
 * Time: 16:18
 */
class PermissionPlugin extends Yaf_Plugin_Abstract {

    public function checkPermission($must=false){
        $action=Yaf_Dispatcher::getInstance()->getRequest()->action;
        $controller=Yaf_Dispatcher::getInstance()->getRequest()->controller;
        $controller=str_replace('info','',$controller);
        $permission=unserialize($_SESSION['user']['permission']);
        //超级管理员验证
        if($must){
            if ($permission['is_administortar']!='1'){
                Helper::response('10000');
            }
        }
        if ($permission['is_administortar']!='1'){
            if(!$this->checkStr($action,'update')){
                if($permission['edit_'.strtolower($controller)]!='1'){
                    Helper::response('10000');
                }
            }
            if(!$this->checkStr($action,'del')){
                if($permission['delete_'.strtolower($controller)]!='1'){
                    Helper::response('10000');
                }
            }
            if(!$this->checkStr($action,'publish')){
                if($permission['publish_'.strtolower($controller)]!='1'){
                    Helper::response('10000');
                }
            }
        }
        return false;
    }
    protected function checkStr($test,$str){
        $rule="/^((?!$str).)*$/is";
        return preg_match($rule,$test);
    }
}