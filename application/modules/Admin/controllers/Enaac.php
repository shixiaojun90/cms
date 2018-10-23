<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午11:10
 */

class EnaacController extends BasicController {
    private function init(){
        Yaf_Registry::get('adminPlugin')->checkLogin();
        Yaf_Registry::get('PermissionPlugin')->checkPermission();
        $this->m_admin=$this->load('User');
        $this->m_enaac = $this->load('Enaac');
        $this->m_article = $this->load('Article');
        $this->m_audit = $this->load('Audit');
    }

    public function indexAction(){
        //$this->getView()->assign(array('artType'=>$this->m_article->Select()));
    }

    /**
     * 分页获取新闻分类
     */
    public function tabPageAction(){
        try{
            //查询
            $data=$this->m_enaac->getAppArtListByPage($_POST['rowCount'],$_POST['current'],$_POST['sort'],$_POST['searchPhrase'],null);
            foreach ($data['data'] as $key=>$val){
               // $data['data'][$key]['article_id']=$this->m_article->getArticleById($val['article_id'])['name'];
                $data['data'][$key]['creater']=$this->m_admin->getUserById($val['creater'])['login'];
                $data['data'][$key]['content']=base64_encode($data['data'][$key]['content']);
            }
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }

    public function getArticleByIdAction(){
        try{
            //查询
            $data=$this->m_enaac->getArticlebyId($_GET['id']);
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }

    public function addAction(){
        try{
            //添加
            $id=$this->m_enaac->Insert(array('creater'=>$_SESSION['user']['id']));
            $ret=$_POST;
            $ret['c_time']=time();
            $ret['creater']=$_SESSION['user']['id'];
            $path='upload/enaac/'.$id.'/avatar/';
            if(isset($ret['file'])){
                unset($ret['file']);
            }else{
                $up = new Upload($_FILES['file'], $path);
                $extpos = strrpos($_FILES['file']['name'],'.');//返回字符串filename中'.'号最后一次出现的数字位置
                $ext = substr($_FILES['file']['name'],$extpos+1);
                $newFileName = md5(basename($_FILES['file']['name'],$ext)); //文件名
                $ret['icon']='http://'.$_SERVER['HTTP_HOST'].'/'.$path.$up->upload($newFileName)['img'];
            }
            if(isset($ret['files'])){
                unset($ret['files']);
            }
            $data=$this->m_enaac->UpdateByID($ret,$id);
            $ed=$this->m_audit->Where(array('audit_id'=>$id,'audit_type'=>0))->Select();
            if(empty($ed)){
                $this->m_audit->Insert(array('audit_type'=>0,'audit_id'=>$id,'nstatus'=>0,'c_time'=>time(),'uid'=>$_SESSION['user']['id']));
            }
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }



    /**
     * Delete enaac
     */
    public function deleteAction(){
        try{
            $result = $this->m_enaac->DeleteByID($_POST['id']);
            $this->m_audit->Where(array('audit_id'=>$_POST['id']))->Delete();
            Helper::response('0',$result);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }

    public function updateByIdAction(){
        try{
            $ret=$_POST;
			var_dump($_POST);exit;
            $ret['u_time']=time();
            $ret['modifyer']=$_SESSION['user']['id'];
            $path='upload/enaac/'.$_POST['id'].'/avatar/';
            if(isset($ret['file'])){
                unset($ret['file']);
            }else{
                $up = new Upload($_FILES['file'], $path);
                $extpos = strrpos($_FILES['file']['name'],'.');//返回字符串filename中'.'号最后一次出现的数字位置
                $ext = substr($_FILES['file']['name'],$extpos+1);
                $newFileName = md5(basename($_FILES['file']['name'],$ext)); //文件名
                $ret['icon']='http://'.$_SERVER['HTTP_HOST'].'/'.$path.$up->upload($newFileName)['img'];
            }
            if(isset($ret['files'])){
                unset($ret['files']);
            }

            $data=$this->m_enaac->UpdateByID($ret,$_POST['id']);

            $ed=$this->m_audit->Where(array('audit_id'=>$_POST['id'],'audit_type'=>0))->Select();
            if(empty($ed)){
                $this->m_audit->Insert(array('audit_type'=>0,'audit_id'=>$_POST['id'],'nstatus'=>0,'status'=>$_POST['status'],'c_time'=>time(),'uid'=>$_SESSION['user']['id']));
            }

            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }

    /**
     * 上传图片
     */
    public function uploadimgAction(){
        $path='upload/enaac/'.$_POST['artId'].'/';
        $up = new Upload($_FILES['file'], $path);
        $extpos = strrpos($_FILES['file']['name'],'.');//返回字符串filename中'.'号最后一次出现的数字位置
        $ext = substr($_FILES['file']['name'],$extpos+1);
        $newFileName = md5(basename($_FILES['file']['name'],$ext)); //文件名
		
        $ret=$up->upload($newFileName);
        if($ret['code']===0){
            Helper::response('0','https://'.$_SERVER['HTTP_HOST'].'/'.$path.$ret['img']);
        }
    }
}
