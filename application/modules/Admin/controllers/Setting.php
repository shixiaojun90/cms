<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午11:10
 */

class SettingController extends BasicController {
    private function init(){
        Yaf_Registry::get('adminPlugin')->checkLogin();
        Yaf_Registry::get('PermissionPlugin')->checkPermission(true);
        $this->m_setting=$this->load('setting');
    }

    public function indexAction(){
       //$this->getView()->assign(array('product'=>$this->m_setting->getoptions('product')));
    }
	
	public function saveAction(){
		try{
			
			if(!empty($_POST['wallet'])){
				foreach ($_POST['wallet'] as $key => $val){
					$name=$this->m_setting->getname(trim($key));
					
					if(!empty($name)){
						$post['c_time']=time();
						$post['type']='wallet';
						$post['name']=$key;
						$post['value']=$val;
						$setid=$this->m_setting->UpdateByID($post,$name['id']);
					}else{
						$post['c_time']=time();
						$post['type']='wallet';
						$post['name']=$key;
						$post['value']=$val;
						$setid=$this->m_setting->Insert($post);
					}
				}
			}
			if($setid){
				$success['code']='0';
				$success['msg']='设置成功';
				Helper::response($success);
			}else{
				$error['code']='1002';
				$error['msg']='设置失败';
				Helper::response($error);
			}
			
        }catch (Exception $ex){
            
        }
    }
    
    
    public function tabPageAction(){
    	try{
    		$data=$this->m_setting->getoptions();
    		//print_r($data);
    		Helper::response('0',$data);
    	}catch (Exception $ex){
    
    	}
    }
    
}
