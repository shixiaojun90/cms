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
        Yaf_Registry::get('PermissionPlugin')->checkPermission();
        $this->m_setting=$this->load('setting');
        $this->m_quantity=$this->load('quantity');
		
    }

    public function indexAction(){
       $this->getView()->assign(array('product'=>$this->m_setting->getoptions('product')));
       $this->getView()->assign(array('quantity'=>$this->m_quantity->getquantity('quantity')));
    }
	
	public function setAction(){
		try{
			if(!empty($_POST['product'])){
				//设置产品库存
				$options=$this->m_setting->getoptions('product');//库存数量
				$quantity=$this->m_quantity->getquantity('quantity');//充值地址
				if(!empty($options)){
					$key=array_keys($_POST['product']);
					$post['name']=$key[0];
					$post['text']=$_POST['product']['quantity'];
					$post['options']='product';
					$post['c_time']=time();
					$setid=$this->m_setting->UpdateByID($post,$options['id']);
				}else{
					$key=array_keys($_POST['product']);
					$post['name']=$key[0];
					$post['text']=$_POST['product']['quantity'];
					$post['options']='product';
					$post['c_time']=time();
					$setid=$this->m_setting->Insert($post);
				}
				
				if(!empty($quantity)){
					$quantity['quantity']=$_POST['client']['quantity'];
					$quantity['type']='quantity';
					$this->m_quantity->UpdateByID($quantity,$quantity['id']);
				}else{
					$post['quantity']=$_POST['client']['quantity'];
					$post['type']='quantity';
					$setid=$this->m_quantity->Insert($post);
				}
			}
			if($setid){
				$options=$this->m_setting->getoptions('product');//库存数量
				
				$success['code']='0';
				$success['text']=$options['text'];
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
    
}
