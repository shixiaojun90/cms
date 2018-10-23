<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午11:10
 */

class WebsitelogController extends BasicController {
    private function init(){
        Yaf_Registry::get('adminPlugin')->checkLogin();
        Yaf_Registry::get('PermissionPlugin')->checkPermission();
        $this->m_admin=$this->load('User');
        //$this->m_websitelog = $this->load('websitelog');
    }

    public function indexAction(){
        //$this->getView()->assign(array('artType'=>$this->m_article->Select()));
    }

    
    
    /**
     * Delete article
     */
    public function deleteAction(){
        try{
            
           
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }

}
