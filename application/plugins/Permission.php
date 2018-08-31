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
        //$controller=str_replace('info','',$controller);
        $permission=unserialize($_SESSION['user']['permission']);
        
        if($must){
        	unset($permission['is_administortar']);
        	
        	if($_SESSION['user']['role']=='9'){
        		return true;
        	}
        	
        	if(!empty($permission)){
        		if(array_key_exists(strtolower($controller), $permission)){
        			$actionlist=$permission[strtolower($controller)];
        			
        			if(in_array($action,$actionlist)){
        				return true;
        			}else{
        				Helper::response('10000',$data);
        			}
        		}else{
        			Helper::response('10000',$data);
        		}
        	}else{
        		Helper::response('10000',$data);
        	}
        	
        	
        }
        
    }
    protected function checkStr($test,$str){
        $rule="/^((?!$str).)*$/is";
        return preg_match($rule,$test);
    }
}