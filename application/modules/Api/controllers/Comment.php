<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午10:42
 */
class CommentController extends BasicController {
    private function init(){
		$this->m_register=$this->load('Register');
		$this->m_comment=$this->load('Comment');
        $this->zhcomment=include_once(LANG_PATH.'/zh/Comment.php');
		$this->encomment=include_once(LANG_PATH.'/en/Comment.php');
		$this->kacomment=include_once(LANG_PATH.'/ka/Comment.php');
		$this->basic=Yaf_Loader::import(FUNC_PATH.'/F_Basic.php');
		$this->network=Yaf_Loader::import(FUNC_PATH.'/F_Network.php');
		//$this->userinfo=$this->getSession('userinfo');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
		session_start();
    }
	
	/**
     * 分页获取新闻分类
     */
    public function tabPageAction(){
        try{
            //查询
			if($_POST['language_id']==1){
				$msg=$this->zhlanguage;
			}elseif($_POST['language_id']==2){
				$msg=$this->enlanguage;
			}else{
				$msg=$this->kalanguage;
			}
			
			$sort='id DESC';
            $data=$this->m_comment->getArtListByPage($_POST['rowCount'],$_POST['current'],$sort,$_POST['searchPhrase'],'(article_id='.$_POST['article_id'].' AND pid=0 AND language_id='.$_POST['language_id'].')');
			
			foreach ($data['data'] as $key=>$val){
                $data['data'][$key]['username']=$this->m_register->getUserById($val['cuid'])['username'];
				$data['data'][$key]['c_time']=format_date($val['c_time']);
				$data['data'][$key]['checkBox']="none";
				$treelist=$this->m_comment->getrefreshbylist($val['id'],$_POST['language_id']);
				
				foreach($treelist['data'] as $rk => $rv){
					$treelist['data'][$rk]['c_time']=format_date($rv['c_time']);
					//$treelist['data'][$rk]=$rv;
				}
				
				$data['data'][$key]['commlist']=$treelist;
				//$data['data'][$key]['commlist'][]['contpage']=7;
				//$data['data'][$key]['commlist']['contpage']=count($data['data'][$key]['commlist']);
				//$data['data'][$key]=$val;
            }
			
			if(!empty($data)){
				Helper::response('0',$data);
			}else{
				$error['code']='1002';
				$error['msg']=$msg['error_info'];
				Helper::response($error);
			}
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
	
	/**
     * 分页获取新闻分类
     */
    public function AbedPageAction(){
        try{
            //查询
			if($_POST['language_id']==1){
				$msg=$this->zhlanguage;
			}elseif($_POST['language_id']==2){
				$msg=$this->enlanguage;
			}else{
				$msg=$this->kalanguage;
			}
			
			$commlist=$this->m_comment->getrefreshbylist($_POST['abed_id'],$_POST['language_id'],$_POST['current'],$_POST['rowCount']);
			
			if(!empty($commlist)){
				$data['code']='0';
				$data['commlist']=$commlist;
				Helper::response($data);
			}else{
				$error['code']='1002';
				$error['msg']=$msg['error_info'];
				Helper::response($error);
			}
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
	
    /**
     * 评论
     */
    public function submitAction(){
		try{
			if($_POST['language_id']==1){
				$msg=$this->zhlanguage;
			}elseif($_POST['language_id']==2){
				$msg=$this->enlanguage;
			}else{
				$msg=$this->kalanguage;
			}
			$userinfo=$this->m_register->getUserById($_POST['uid']);
			if(!empty($userinfo) && $userinfo['access_token']==$_POST['token'] && $userinfo['id']==$_POST['uid']){
				if(empty($_POST['content'])){
					$error['code']='1002';
					$error['msg']=$msg['error_content'];
					Helper::response($error);
				}
				$post['pid']=!empty($_POST['pid']) ? $_POST['pid'] : '0';
				$post['cuid']=$_POST['uid'];
				$post['article_id']=$_POST['article_id'];
				$post['content']=removeXSS($_POST['content']);
				$post['language_id']=$_POST['language_id'];
				$post['c_time']=time();
				$post['abed_id']=!empty($_POST['abed_id']) ? $_POST['abed_id'] : '0';
				$post['ip']=getClientIP();
				
				$commid=$this->m_comment->Insert($post);
				if($commid){
					
					//$data=$this->m_comment->Totalnumbers();
					//$sort='id DESC';
					//$numbers=$this->m_comment->getArtListByPage('','',$sort,'','(article_id='.$_POST['article_id'].' AND  pid=0 AND language_id='.$_POST['language_id'].')');
					//查询总条数
					$numbers=$this->m_comment->Totalnumbers('(article_id='.$_POST['article_id'].' AND  pid=0 AND language_id='.$_POST['language_id'].')');
					$data['code']='0';
					//$data['msg']=$msg['comment_success'];
					//查询一层数据
					
					
					//$inserinfo['commlist'][]=$this->m_comment->getArticlebyId($commid);
					if(empty($_POST['pid']) || $_POST['pid']==0){
						$inserinfo=$this->m_comment->getArticlebyId($commid);
						$inserinfo['commlist']['data']=array();
						//$inserinfo['commlist']['data']['c_time']=format_date($inserinfo['c_time']);
					}else{
						$comm=$this->m_comment->getArticlebyId($commid);
						$inserinfo=$this->m_comment->getArticlebyId($_POST['pid']);						
						$inserinfo['commlist']=$comm;
						$inserinfo['commlist']['c_time']='1秒前';
					}
					
					//$list=array_merge($inserinfo,$pinfo);
					
					if(!empty($inserinfo)){
						unset($inserinfo['ip']);
						unset($inserinfo['verifyer']);
						unset($inserinfo['language_id']);
						//unset($inserinfo['c_time']);
						$info=$inserinfo;
						
						$data['data']=$info;
						$data['data']['username']=$this->m_register->getUserById($info['cuid'])['username'];
						$data['data']['c_time']=empty(format_date($inserinfo['c_time'])) ? "1秒前" : format_date($inserinfo['c_time']);
						$data['data']['checkBox']="none";
						$data['data']['total']=$numbers['total'];
						//$data['data']['html']='';
					}else{
						$data['data']=array();
					}
					
					Helper::response($data);
				}else{
					$data['code']='10021';
					$data['msg']=$msg['comment_error'];
					Helper::response($data);
				}
			}else{
				$data['code']='10022';
				$data['msg']=$msg['error_status'];
				Helper::response($data);
			}
			
			
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }

    
}
