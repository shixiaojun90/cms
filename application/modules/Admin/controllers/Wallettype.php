<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午11:10
 */

class WallettypeController extends BasicController {
    private function init(){
        Yaf_Registry::get('adminPlugin')->checkLogin();
        Yaf_Registry::get('PermissionPlugin')->checkPermission(true);
        $this->m_admin=$this->load('User');
        $this->wallettype = $this->load('wallettype');
		//$this->basic=Yaf_Loader::import(FUNC_PATH.'/F_Basic.php');
    }

    public function indexAction(){
        //this->getView()->assign(array('artType'=>$this->m_article->Select()));
    }

    /**
     * 分页获取新闻分类
     */
    public function tabPageAction(){
        try{
			
			
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
	
	
	public function addAction(){
        try{
            //添加
			$list=$_POST;
			
			Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
	
	
    public function updateByIdAction(){
        try{
				
			
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
	
}
