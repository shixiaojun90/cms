<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午9:46
 */
class ArticleController extends BasicController {

    private $m_article;
    private $m_admin;
    private function init(){
        Yaf_Registry::get('adminPlugin')->checkLogin();
        Yaf_Registry::get('PermissionPlugin')->checkPermission();
        $this->m_article = $this->load('Article');
        $this->m_admin=$this->load('User');
        $this->homeUrl = '/admin/article';
    }

    public function indexAction(){

    }

    /**
     * 分页获取新闻分类
     */
    public function tabPageAction(){
        try{
            //查询
			$sort='id desc';
            $data=$this->m_article->getArtListByPage($_POST['rowCount'],$_POST['current'],$sort,$_POST['searchPhrase']);

            foreach ($data['data'] as $key=>$val){
                $data['data'][$key]['c_time']=date('Y-m-d H:i:s',$val['c_time']);
                $data['data'][$key]['u_time']=date('Y-m-d H:i:s',$val['u_time']);
                $data['data'][$key]['uid']=$val['uid'];
                $data['data'][$key]['username']=$this->m_admin->getUserById($val['uid'])['login'];
            }
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }

    /**
     * 根据id获取新闻分类
     */
    public function getArticleByIdAction(){
        try{
            //查询
            $data=$this->m_article->getArticlebyId($_GET['id']);
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }

    /**
     * 根据id更新新闻分类
     */
    public function updateArticleByIdAction(){
        try{
            $ret=$_POST['data'];
            $ret['u_time']=time();
            $ret['uid']=$_SESSION['user']['id'];
            $data=$this->m_article->UpdateByID($ret,$_POST['id']);
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }

    /**
     * Add new article
     */
    public function addAction(){
        try{
            $ret=$_POST['data'];
            $ret['c_time']=time();
            $ret['u_time']=time();
            $ret['uid']=$_SESSION['user']['id'];
            $data=$this->m_article->Insert($ret);
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }

    /**
     * Delete article
     */
    public function deleteAction(){
        try{
            $result = $this->m_article->DeleteByID($_POST['id']);
            Helper::response('0',$result);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }

}