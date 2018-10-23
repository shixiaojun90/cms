<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午11:10
 */

class BannerController extends BasicController {
    private function init(){
        Yaf_Registry::get('adminPlugin')->checkLogin();
        Yaf_Registry::get('PermissionPlugin')->checkPermission();
        $this->m_admin=$this->load('User');
        $this->m_banner = $this->load('banner');
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
            $data=$this->m_banner->getAppArtListByPage($_POST['rowCount'],$_POST['current'],$sort,$_POST['searchPhrase'],null);
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
            $data=$this->m_banner->getArticlebyId($_GET['id']);
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
			
			
			if(!empty($_FILES['file'])){
				$appimg['file']=$_FILES['file'];
				
				$i=0;
				foreach($appimg as $file){
					foreach($file['name'] as $key => $val){
						$files[$i]['name']=$file['name'][$key];
						$files[$i]['type']=$file['type'][$key];
						$files[$i]['tmp_name']=$file['tmp_name'][$key];
						$files[$i]['error']=$file['error'][$key];
						$files[$i]['size']=$file['size'][$key];
						$i++;
					}
				}
				
				foreach($files as $key => $val){
					//foreach($_POST['post'] as $k => $v){
						unset($_POST['sort']);
						$up = new Upload($val, $path);
						$extpos = strrpos($val['name'],'.');//返回字符串filename中'.'号最后一次出现的数字位置
						$ext = substr($val['name'],$extpos+1);
						$newFileName = md5(basename($val['name'],$ext)); //文件名
						$ret['img']='http://'.$_SERVER['HTTP_HOST'].'/'.$path.$up->upload($newFileName)['img'];
						$ret['sort']=$v['sort'];
						$this->m_banner->Insert($ret);
					//}
				}
				//ksort($json);
				//$ret['app_imgs']=serialize($json);
				$ret['img']=$json;
				
			}else{
				$ret['app_imgs']='';
			}
            //$data=$this->m_banner->Insert($ret);
            
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
            $result = $this->m_banner->DeleteByID($_POST['id']);
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
            
            $data=$this->m_banner->UpdateByID($ret,$_POST['id']);
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }

    /**
     * 上传图片
     */
    public function uploadimgAction(){
        $path='upload/article/'.$_POST['artId'].'/';
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
