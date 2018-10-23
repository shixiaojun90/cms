<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午11:10
 */

class CurrencyController extends BasicController {
    private function init(){
        Yaf_Registry::get('adminPlugin')->checkLogin();
        Yaf_Registry::get('PermissionPlugin')->checkPermission();
        $this->m_currency = $this->load('currency');
		$this->m_admin=$this->load('User');
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
			$sort='id desc';
            $data=$this->m_currency->getAppArtListByPage($_POST['rowCount'],$_POST['current'],$_POST['sort'],$_POST['searchPhrase'],null);
			
            foreach ($data['data'] as $key=>$val){
                $data['data'][$key]['creater']=$this->m_admin->getUserById($val['creater'])['login'];
            }
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }

    public function getArticleByIdAction(){
        try{
            //查询
            $data=$this->m_currency->getArticlebyId($_GET['id']);
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }

    public function addAction(){
        try{
            //添加
            $ret=$_POST;
            $ret['c_time']=time();
            $ret['creater']=$_SESSION['user']['id'];
			$ret['ip']=getClientIP();
            /*$path='upload/aac/'.$_POST['bname'].'/';
            if(isset($ret['file'])){
                unset($ret['file']);
            }else{
                $up = new Upload($_FILES['file'], $path);
                $extpos = strrpos($_FILES['file']['name'],'.');//返回字符串filename中'.'号最后一次出现的数字位置
                $ext = substr($_FILES['file']['name'],$extpos+1);
                $newFileName = md5(basename($_FILES['file']['name'],$ext)); //文件名
                $ret['bimg']='https://'.$_SERVER['HTTP_HOST'].'/'.$path.$up->upload($newFileName)['img'];
            }
            if(isset($ret['files'])){
                unset($ret['files']);
            }*/
			
			$this->m_currency->Insert($ret);
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
            $result = $this->m_currency->DeleteByID($_POST['id']);
            $this->m_audit->Where(array('audit_id'=>$_POST['id']))->Delete();
            Helper::response('0',$result);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }

    public function updateByIdAction(){
        try{
            $ret=$_POST;
            $ret['c_time']=time();
            $ret['creater']=$_SESSION['user']['id'];
			
            /*$path='upload/aac/'.$_POST['bname'].'/';
			
            if(isset($ret['file'])){
                unset($ret['file']);
            }else{
                $up = new Upload($_FILES['file'], $path);
                $extpos = strrpos($_FILES['file']['name'],'.');//返回字符串filename中'.'号最后一次出现的数字位置
                $ext = substr($_FILES['file']['name'],$extpos+1);
                $newFileName = md5(basename($_FILES['file']['name'],$ext)); //文件名
                $ret['bimg']='https://'.$_SERVER['HTTP_HOST'].'/'.$path.$up->upload($newFileName)['img'];
            }
            if(isset($ret['files'])){
                unset($ret['files']);
            }*/
			
            $data=$this->m_currency->UpdateByID($ret,$_POST['id']);
			
            /*$ed=$this->m_audit->Where(array('audit_id'=>$_POST['id'],'audit_type'=>0))->Select();
            if(empty($ed)){
                $this->m_audit->Insert(array('audit_type'=>0,'audit_id'=>$_POST['id'],'nstatus'=>0,'c_time'=>time(),'uid'=>$_SESSION['user']['id']));
            }*/

            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }

    /**
     * 上传图片
     */
    public function uploadimgAction(){
        $path='upload/aac/'.$_POST['artId'].'/';
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
