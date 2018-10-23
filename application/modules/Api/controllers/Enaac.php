<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午10:42
 */
class EnaacController extends BasicController {
    private function init(){
        $this->m_enaac = $this->load('Enaac');
        $this->m_admin=$this->load('User');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
    }

    /**
     * 分页获取新闻分类
     */
    public function tabPageAction(){
        try{
            //查询
			$sort='level ASC,id DESC';
            $data=$this->m_enaac->getAppArtListByPage($_POST['rowCount'],$_POST['current'],$sort,$_POST['searchPhrase'],'(status=2)');
			
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }

    public function getArticleByIdAction(){
        try{
            $data=$this->m_enaac->getArticlebyId($_POST['id']);
			//$data['creater']=$this->m_admin->getUserById($data['creater'])['login'];
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
	
	/**
     * 重要公告
     */
    public function settingAction(){
        try{
            //查询
			$sort='level ASC,id DESC';
			//$sort['id']='DESC';
            $data=$this->m_enaac->getAppArtListByPage($_POST['rowCount'],$_POST['current'],$sort,$_POST['searchPhrase'],'(status=2 AND setting=1)');
			
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
}
