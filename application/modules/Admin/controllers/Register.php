<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午10:42
 */
class RegisterController extends BasicController {
    private function init(){
        Yaf_Registry::get('adminPlugin')->checkLogin();
        Yaf_Registry::get('PermissionPlugin')->checkPermission();
        $this->m_register=$this->load('Register');
		$this->m_zhaac = $this->load('Zhaac');
		$this->m_comment=$this->load('Comment');
		$this->network=Yaf_Loader::import(FUNC_PATH.'/F_Network.php');
    }
	
	public function indexAction(){
        
    }
	
    /**
     * 分页获取新闻分类
     */
    public function tabPageAction(){
        try{
            //查询
			$sort='id DESC';
            $data=$this->m_register->getArtListByPage($_POST['rowCount'],$_POST['current'],$sort,$_POST['searchPhrase'],'(language_id=1)');
			
            foreach ($data['data'] as $key=>$val){
                //$data['data'][$key]['email']=$this->m_register->getUserByname($val['cuid'])['email'];
                //$data['data'][$key]['article_id']=$this->m_zhaac->getArticlebyId($val['article_id'])['name'];
                $data['data'][$key]['c_time']=date('Y-m-d H:i:s',$val['c_time']);
				//$cuid=$this->m_comment->getArticlebyId($val['pid'])['cuid'];
            }
			
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
	
	public function updateByIdAction(){
        try{
			
            $ret=$_POST;
            //$ret['verifyer']=;
            $data=$this->m_register->UpdateByID($ret,$_POST['id']);
			
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }

    public function getArticleByIdAction(){
        try{
            //查询
            $data=$this->m_zhaac->getArticlebyId($_GET['id']);
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
			$delid=$this->m_register->Where(array('id'=>$_POST['id']))->Delete();
			
            Helper::response('0',$result);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
}
