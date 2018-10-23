<?php

class VoteController extends BasicController {

    private $m_vote;

    private function init(){
        Yaf_Registry::get('adminPlugin')->checkLogin();
        Yaf_Registry::get('PermissionPlugin')->checkPermission(true);
        $this->m_vote  = $this->load('vote');

    }

    /**
     *  Index : list all votes
     */
    public function indexAction(){
        $this->getView()->assign(array('global'=>json_encode($_SESSION['user']['global'])));
    }

    public function tabPageAction(){
        try{
            //查询
			$sort='id desc';
            $data=$this->m_vote->getVoteListByPage($_POST['rowCount'],$_POST['current'],$sort,$_POST['searchPhrase']);
            foreach($data['data'] as $item =>$key){
                $data['data'][$item]['username']=$this->load('user')->getUserById($data['data'][$item]['uid'])['login'];
            }
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }

    public  function getVoteByIdAction(){
        try{
            //查询
            $data=$this->m_vote->getVoteByID($_GET['id']);
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }


    public function updateByVoteIDAction(){
        try{
            $ret=$_POST;
            $path='upload/vote/project/'.$_POST['id'].'/';
            if(isset($ret['show_img'])){
                unset($ret['show_img']);
            }else{
                $up = new Upload($_FILES['show_img'], $path);
                $extpos = strrpos($_FILES['show_img']['name'],'.');//返回字符串filename中'.'号最后一次出现的数字位置
                $ext = substr($_FILES['show_img']['name'],$extpos+1);
                $newFileName = md5(basename($_FILES['show_img']['name'],$ext)); //文件名
                $ret['show_img']='http://'.$_SERVER['HTTP_HOST'].'/'.$path.$up->upload($newFileName)['img'];
            }
            $data=$this->m_vote->updateVoteByID($ret,$_POST['id']);
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }


    /**
     * Add new vote
     */
    public function addAction(){
        try{
            //添加
            $id=$this->m_vote->Insert(array('uid'=>$_SESSION['user']['id'],'c_time'=>time()));
            $ret=$_POST;

            $ret['c_time']=time();
            $ret['uid']=$_SESSION['user']['id'];
            $path='upload/vote/project/'.$_POST['id'].'/';
            if(isset($ret['show_img'])){
                unset($ret['show_img']);
            }else{
                $up = new Upload($_FILES['show_img'], $path);
                $extpos = strrpos($_FILES['show_img']['name'],'.');//返回字符串filename中'.'号最后一次出现的数字位置
                $ext = substr($_FILES['show_img']['name'],$extpos+1);
                $newFileName = md5(basename($_FILES['show_img']['name'],$ext)); //文件名
                $ret['show_img']='http://'.$_SERVER['HTTP_HOST'].'/'.$path.$up->upload($newFileName)['img'];
            }
            $data=$this->m_vote->updateVoteByID($ret,$id);
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }



    /**
     * Delete
     */
    public function deleteAction(){
        try{
            $result = $this->m_vote->DeleteByID($_POST['id']);
            Helper::response('0',$result);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }

    function saveImage($path,$file_dir) {
        if(!preg_match('/\/([^\/]+\.[a-z]{3,4})$/i',$path,$matches))
            die('Use image please');
        $image_name = strToLower($matches[1]);
        $ch = curl_init ($path);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
        $img = curl_exec ($ch);
        curl_close ($ch);
        $fp = fopen($file_dir.$image_name,'w');
        fwrite($fp, $img);
        fclose($fp);
        return substr($file_dir.$image_name,1);
    }

}