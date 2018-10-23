<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午10:42
 */
class ZhcommentController extends BasicController {
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
            $data=$this->m_comment->getArtListByPage($_POST['rowCount'],$_POST['current'],$sort,$_POST['searchPhrase'],'(language_id=1)');
			
            foreach ($data['data'] as $key=>$val){
                $data['data'][$key]['username']=$this->m_register->getUserById($val['cuid'])['username'];
                $data['data'][$key]['article_id']=$this->m_zhaac->getArticlebyId($val['article_id'])['name'];
                $data['data'][$key]['c_time']=format_date($val['c_time']);
				$cuid=$this->m_comment->getArticlebyId($val['pid'])['cuid'];
				if(!$cuid){
					$data['data'][$key]['pid']='公告新闻';
				}else{
					$data['data'][$key]['pid']=$this->m_register->getUserById($cuid)['username'];
				}
            }
			
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
	
	public function updateByIdAction(){
        try{
			var_dump($this->getSession('user'));exit;
            $ret=$_POST;
            //$ret['verifyer']=;
            $data=$this->m_comment->UpdateByID($ret,$_POST['id']);
			
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
    public function deleteAction(&$pid=0){
        try{
			$info=$this->m_comment->getArticlebyId($_POST['id']);
			if($info['pid'] == 0){
				$delid=$this->m_comment->Where(array('abed_id'=>$_POST['id']))->Delete();
				$delid=$this->m_comment->Where(array('id'=>$_POST['id']))->Delete();
			}else{
				$falg=$this->m_comment->getabedidlist($_POST['id']);
			}
			
			if($falg){
				$delid=$this->m_comment->Where(array('id'=>$_POST['id']))->Delete();
			}
            
            Helper::response('0',$result);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }

   
}
