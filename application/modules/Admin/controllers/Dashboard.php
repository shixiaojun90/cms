<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/9/14
 * Time: 下午5:44
 */
class DashboardController extends BasicController {

    private function init(){
        Yaf_Registry::get('adminPlugin')->checkLogin();
        Yaf_Registry::get('PermissionPlugin')->checkPermission();
    }

    public function indexAction(){
		
    }
}