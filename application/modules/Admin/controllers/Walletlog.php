<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午11:10
 */

class WalletlogController extends BasicController {
    private function init(){
        Yaf_Registry::get('adminPlugin')->checkLogin();
        Yaf_Registry::get('PermissionPlugin')->checkPermission(true);
        $this->m_walletlog = $this->load('walletlog');
		//$this->basic=Yaf_Loader::import(FUNC_PATH.'/F_Basic.php');
        $this->m_setting=$this->load('setting');
        $this->globar=Yaf_Registry::get('GlobarPlugin')->getArray_key($this->m_setting->getoptions(),'name');
    }

    public function indexAction(){
        $this->getView()->assign(array('offset'=>$this->globar['offset']['value']));
    }
	

    /**
     * 提币审核列表
     */
    public function tabPageAction(){
        try{
        	empty($_POST['current']) ? $params['current']='1' : $params['current']=$_POST['current'];
        	empty($_POST['rowCount']) ? $params['rowCount']='20' : $params['rowCount']=$_POST['rowCount'];
        	$sort='id desc';
        	$data=$this->m_walletlog->getArtListByPage($params['rowCount'],$params['current'],$sort,$_POST['searchPhrase'],null);
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
	
    
    public function getByIdAction(){
    	try{
    		$data=$this->m_walletlog->getArticlebyId($_POST['id']);
    		foreach ($data as $key => $val){
    			$data[$key]=strip_tags(addslashes($val));
    		}
    		Helper::response('0',$data);
    	}catch (Exception $ex){
    		Helper::response('1006',$ex);
    	}
    }
	
}
