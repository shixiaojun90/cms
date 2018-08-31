<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 16/11/3
 * Time: 11:29
 */
class CatenavController extends BasicController {
    private function init(){
        Yaf_Registry::get('adminPlugin')->checkLogin();
        Yaf_Registry::get('PermissionPlugin')->checkPermission(true);
        $this->m_role  = $this->load('role');
        $this->m_menu  = $this->load('menu');
        $this->m_setting=$this->load('setting');
        $this->globar=Yaf_Registry::get('GlobarPlugin')->getArray_key($this->m_setting->getoptions(),'name');
    }

    public function indexAction(){
    	$menu=$this->m_menu->getMenulist();
    	$array=get_tree($menu);

        foreach($array as $key => $val){
        	$array[$key]['name']=$val['html'].$val['name'];
        }
    	
    	$this->getView()->assign(array('menu'=>$array));//当天
    	$this->getView()->assign(array('offset'=>$this->globar['offset']['value']));
    }
    
    public function tabPageAction(){
        try{
        	/*empty($_POST['current']) ? $params['current']='1' : $params['current']=$_POST['current'];
        	empty($_POST['rowCount']) ? $params['rowCount']=$this->globar['offset']['value'] : $params['rowCount']=$_POST['rowCount'];
        	$sort='id asc,level asc';
        	$data=$this->m_menu->getNavPage($params['rowCount'],$params['current'],$sort,$_POST['searchPhrase'],'');
        	
        	//$array=get_tree($list['data']);*/
        	
        	$menu=$this->m_menu->getMenulist();
        	$array=get_tree($menu);
        	
        	foreach($array as $key => $val){
        		$array[$key]['name']=$val['html'].$val['name'];
        	}
        	
        	$data['data']=$array;

            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
	
	
    public  function getnavByIdAction(){
        try{
        	$data=$this->m_menu->getNavmenu($_POST['id']);
        	
        	$data['pid']=$this->m_menu->getNavmenu($data['p_id'])['name'];
        	
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
	
    public function updatenavByIdAction(){
        try{
        	$this->m_menu->UpdateByID($_POST,$_POST['id']);
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
        	unset($_POST['id']);
        	$data=$this->m_menu->Insert($_POST);
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
        	$this->m_menu->Where(array('id'=>$_POST['id']))->Delete();
        	$this->m_menu->Where(array('p_id'=>$_POST['id']))->Delete();
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
}
