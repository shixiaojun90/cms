<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午10:42
 */
class ArticleController extends BasicController {
    private function init(){
        $this->m_articleinfo = $this->load('Articleinfo');
        $this->m_article = $this->load('Article');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
    }

    /**
     * 分页获取新闻分类
     */
    public function tabPageAction(){
        try{
            //查询
			
            $data=$this->m_articleinfo->getAppArtListByPage($_GET['rowCount'],$_GET['current'],$_GET['sort'],$_GET['searchPhrase'],'(status=2)');
			$data['pagecount']=ceil($data['total']/$_GET['rowCount']);
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }

    public function getArticleByIdAction(){
        try{
            $data=$this->m_articleinfo->getArticlebyId($_GET['id']);
			
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
}
