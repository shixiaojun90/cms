<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午11:10
 */

class LinkimgController extends BasicController {
    private function init(){
        Yaf_Registry::get('adminPlugin')->checkLogin();
        Yaf_Registry::get('PermissionPlugin')->checkPermission();
        $this->m_admin=$this->load('User');
        $this->m_zhaac = $this->load('Zhlinkimg');
        $this->m_enaac = $this->load('Enlinkimg');
        $this->m_kaaac = $this->load('kalinkimg');
        $this->m_jsaac = $this->load('jsaac');
        //$this->m_article = $this->load('Article');
        $this->m_audit = $this->load('Audit');
    }

    public function indexAction(){
        //this->getView()->assign(array('artType'=>$this->m_article->Select()));
    }

    /**
     * 分页获取新闻分类
     */
    public function tabPageAction(){
        try{
            //查询
			$sort='sort ASC,id DESC';
            $data=$this->m_zhaac->getArtListByPage($_POST['rowCount'],$_POST['current'],$sort,$_POST['searchPhrase'],null);
            foreach ($data['data'] as $key=>$val){
                //$data['data'][$key]['article_id']=$this->m_article->getArticleById($val['article_id'])['name'];
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
            $data['zhdata']=$this->m_zhaac->getArticlebyId($_GET['id']);
            $data['endata']=$this->m_enaac->getArticlebyId($_GET['id']);
            $data['kadata']=$this->m_kaaac->getArticlebyId($_GET['id']);
            $data['jsdata']=$this->m_jsaac->getArticlebyId($_GET['id']);
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }

    public function addAction(){
        try{
            //添加
			
			$zharr=$enarr=$kaarr=$jsarr=$_POST;

			if(empty($zharr['zhnews']['title'])){
				$error['code']='1002';
				$error['msg']='中文名称不能为空';
				Helper::response($error);
			}elseif(empty($enarr['ennews']['title'])){
				$error['code']='1002';
				$error['msg']='英文名称不能为空';
				Helper::response($error);
			}else{
				$auditid=$this->m_audit->Insert(array('audit_type'=>0,'nstatus'=>0,'c_time'=>time(),'uid'=>$_SESSION['user']['id']));
				if($auditid){
					//中文aac表
					$zharr['zhnews']['c_time']=time();
					$zharr['zhnews']['id']=$auditid;
					$zharr['zhnews']['creater']=$_SESSION['user']['id'];
					$zharr=$zharr['zhnews'];
					//英文aac表
					$enarr['ennews']['c_time']=time();
					$enarr['ennews']['id']=$auditid;
					$enarr['ennews']['creater']=$_SESSION['user']['id'];
					$enarr=$enarr['ennews'];
					
					//韩文kaaac表
					$kaarr['kanews']['c_time']=time();
					$kaarr['kanews']['id']=$auditid;
					$kaarr['kanews']['creater']=$_SESSION['user']['id'];
					$kaarr=$kaarr['kanews'];
					
					$path='upload/article/'.$auditid.'/avatar/';
					if(!empty($_FILES['zhfile'])){
						$up = new Upload($_FILES['zhfile'], $path);
						$extpos = strrpos($_FILES['zhfile']['name'],'.');//返回字符串filename中'.'号最后一次出现的数字位置
						$ext = substr($_FILES['zhfile']['name'],$extpos+1);
						$newFileName = md5(basename($_FILES['zhfile']['name'],$ext)); //文件名
						$zharr['icon']='http://'.$_SERVER['HTTP_HOST'].'/'.$path.$up->upload($newFileName)['img'];
					}
					
					if(!empty($_FILES['enfile'])){
						$up = new Upload($_FILES['enfile'], $path);
						$extpos = strrpos($_FILES['enfile']['name'],'.');//返回字符串filename中'.'号最后一次出现的数字位置
						$ext = substr($_FILES['enfile']['name'],$extpos+1);
						$newFileName = md5(basename($_FILES['enfile']['name'],$ext)); //文件名
						$enarr['icon']='http://'.$_SERVER['HTTP_HOST'].'/'.$path.$up->upload($newFileName)['img'];
					}
					
					if(!empty($_FILES['kafile'])){
						$up = new Upload($_FILES['kafile'], $path);
						$extpos = strrpos($_FILES['kafile']['name'],'.');//返回字符串filename中'.'号最后一次出现的数字位置
						$ext = substr($_FILES['kafile']['name'],$extpos+1);
						$newFileName = md5(basename($_FILES['kafile']['name'],$ext)); //文件名
						$kaarr['icon']='http://'.$_SERVER['HTTP_HOST'].'/'.$path.$up->upload($newFileName)['img'];
					}
					
					if(!empty($_FILES['jsfile'])){
						$up = new Upload($_FILES['jsfile'], $path);
						$extpos = strrpos($_FILES['jsfile']['name'],'.');//返回字符串filename中'.'号最后一次出现的数字位置
						$ext = substr($_FILES['jsfile']['name'],$extpos+1);
						$newFileName = md5(basename($_FILES['jsfile']['name'],$ext)); //文件名
						$jsarr['icon']='http://'.$_SERVER['HTTP_HOST'].'/'.$path.$up->upload($newFileName)['img'];
					}
					
					//启动事务
					unset($zharr['zhfile']);
					unset($enarr['enfile']);
					unset($kaarr['kafile']);
					unset($jsarr['jsfile']);
					$this->m_zhaac->beginTransaction();
					$zhid=$this->m_zhaac->Insertsetfield($zharr);
					$enid=$this->m_enaac->Insertsetfield($enarr);
					$kaid=$this->m_kaaac->Insertsetfield($kaarr);
					
					if(!empty($jsarr['jsnews']['title'])){
						//日文kaaac表
						$jsarr['jsnews']['c_time']=time();
						$jsarr['jsnews']['id']=$auditid;
						$jsarr['jsnews']['creater']=$_SESSION['user']['id'];
						$jsarr=$jsarr['jsnews'];
						$jsid=$this->m_jsaac->Insertsetfield($jsarr);
					}
					
					if($zhid && $enid){
						$this->m_zhaac->Commit();
					}else{
						$this->m_zhaac->Rollback();
					}
				}
				Helper::response('0',$data);
			}
			
            //$data=$this->m_zhaac->UpdateByID($ret,$id);
            //$ed=$this->m_audit->Where(array('audit_id'=>$id,'audit_type'=>0))->Select();
            //if(empty($ed)){
                
            //}
            
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }



    /**
     * Delete zhaac
     */
    public function deleteAction(){
        try{
            //$zhresult = $this->m_zhaac->DeleteByID($_POST['id']);
            //$enresult = $this->m_enaac->DeleteByID($_POST['id']);
			//$auditresult = $this->m_audit->DeleteByID($_POST['id']);
			$auditid=$this->m_audit->Where(array('id'=>$_POST['id']))->SelectOne();
			$status['status']=4;
			$zhupid=$this->m_zhaac->UpdateByID($status,$auditid['id']);
			$enupid=$this->m_enaac->UpdateByID($status,$auditid['id']);
			$kaupid=$this->m_kaaac->UpdateByID($status,$auditid['id']);
			$jsupid=$this->m_jsaac->UpdateByID($status,$auditid['id']);
            //$this->m_audit->Where(array('audit_id'=>$_POST['id']))->Delete();
            Helper::response('0',$result);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }

    public function updateByIdAction(){
        try{
            $zharr=$enarr=$kaarr=$jsarr=$_POST;
			if(empty($zharr['zhnews']['title'])){
				$error['code']='1002';
				$error['msg']='中文名称不能为空';
				Helper::response($error);
			}elseif(empty($enarr['ennews']['title'])){
				$error['code']='1002';
				$error['msg']='英文名称不能为空';
				Helper::response($error);
			}else{
				$auditid=$this->m_audit->Where(array('id'=>$zharr['zhnews']['id']))->SelectOne();//,'audit_type'=>0
				if(!empty($auditid)){
					if(!empty($_POST['zhnews']) && !empty($_POST['ennews'])){
						$zharr['zhnews']['c_time']=time();
						$enarr['ennews']['c_time']=time();
						//$kaarr['kanews']['u_time']=time();
						//$kaarr['jsnews']['u_time']=time();
						$zharr=$zharr['zhnews'];
						$enarr=$enarr['ennews'];
						//$kaarr=$kaarr['kanews'];
						//$jsarr=$jsarr['jsnews'];
						$path='upload/article/'.$auditid['id'].'/avatar/';
						if(!empty($_FILES['zhfile'])){
							$up = new Upload($_FILES['zhfile'], $path);
							$extpos = strrpos($_FILES['zhfile']['name'],'.');//返回字符串filename中'.'号最后一次出现的数字位置
							$ext = substr($_FILES['zhfile']['name'],$extpos+1);
							$newFileName = md5(basename($_FILES['zhfile']['name'],$ext)); //文件名
							$zharr['icon']='http://'.$_SERVER['HTTP_HOST'].'/'.$path.$up->upload($newFileName)['img'];
						}
						
						
						if(!empty($_FILES['enfile'])){
							$up = new Upload($_FILES['enfile'], $path);
							$extpos = strrpos($_FILES['enfile']['name'],'.');//返回字符串filename中'.'号最后一次出现的数字位置
							$ext = substr($_FILES['enfile']['name'],$extpos+1);
							$newFileName = md5(basename($_FILES['enfile']['name'],$ext)); //文件名
							$enarr['icon']='http://'.$_SERVER['HTTP_HOST'].'/'.$path.$up->upload($newFileName)['img'];
						}
					
						if(!empty($_FILES['kafile'])){
							$up = new Upload($_FILES['kafile'], $path);
							$extpos = strrpos($_FILES['kafile']['name'],'.');//返回字符串filename中'.'号最后一次出现的数字位置
							$ext = substr($_FILES['kafile']['name'],$extpos+1);
							$newFileName = md5(basename($_FILES['kafile']['name'],$ext)); //文件名
							$kaarr['icon']='http://'.$_SERVER['HTTP_HOST'].'/'.$path.$up->upload($newFileName)['img'];
						}
						
						if(!empty($_FILES['jsfile'])){
							$up = new Upload($_FILES['jsfile'], $path);
							$extpos = strrpos($_FILES['jsfile']['name'],'.');//返回字符串filename中'.'号最后一次出现的数字位置
							$ext = substr($_FILES['jsfile']['name'],$extpos+1);
							$newFileName = md5(basename($_FILES['jsfile']['name'],$ext)); //文件名
							$jsarr['icon']='http://'.$_SERVER['HTTP_HOST'].'/'.$path.$up->upload($newFileName)['img'];
						}
						
						$zhupid=$this->m_zhaac->UpdateByID($zharr,$auditid['id']);
						$enupid=$this->m_enaac->UpdateByID($enarr,$auditid['id']);
						$kaaac=$this->m_kaaac->getArticlebyId($kaarr,$auditid['id']);
						if(empty($kaaac)){
							//韩文kaaac表
							$kaarr['kanews']['c_time']=time();
							$kaarr['kanews']['id']=$auditid['id'];
							$kaarr['kanews']['creater']=$_SESSION['user']['id'];
							$kaarr=$kaarr['kanews'];
							$kaid=$this->m_kaaac->Insertsetfield($kaarr);
						}else{
							$kaarr=$kaarr['kanews'];
							//$kaarr['kanews']['u_time']=time();
							$kaupid=$this->m_kaaac->UpdateByID($kaarr,$auditid['id']);
						}
						
						if(!empty($jsarr)){
							$jsaac=$this->m_jsaac->getArticlebyId($auditid['id']);
							if(empty($jsaac)){
								//日文kaaac表
								$jsarr['jsnews']['c_time']=time();
								$jsarr['jsnews']['id']=$auditid['id'];
								$jsarr['jsnews']['creater']=$_SESSION['user']['id'];
								$jsarr=$jsarr['jsnews'];
								$kaid=$this->m_jsaac->Insertsetfield($jsarr);
							}else{
								$jsarr=$jsarr['jsnews'];
								$jsupid=$this->m_jsaac->UpdateByID($jsarr,$auditid['id']);
							}
							
						}
						/*$this->m_zhaac->beginTransaction();
						$zhupid=$this->m_zhaac->UpdateByID($zharr,$auditid['id']);
						$enupid=$this->m_enaac->UpdateByID($enarr,$auditid['id']);
						
						if($zhupid && $enupid){
							$this->m_zhaac->Commit();
							$this->m_enaac->Commit();
						}else{
							$this->m_zhaac->Rollback();
						}*/
					}
				}else{
					$data='操作失败';
				}
			}

            //if(empty($ed)){
            //    $this->m_audit->Insert(array('audit_type'=>0,'audit_id'=>$_POST['id'],'nstatus'=>0,'status'=>$_POST['status'],'c_time'=>time(),'uid'=>$_SESSION['user']['id']));
            //}

            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }

    /**
     * 上传图片
     */
    public function uploadimgAction(){
        $path='upload/aacnews/';
        $up = new Upload($_FILES['file'], $path);
        $extpos = strrpos($_FILES['file']['name'],'.');//返回字符串filename中'.'号最后一次出现的数字位置
        $ext = substr($_FILES['file']['name'],$extpos+1);
        $newFileName = md5(basename($_FILES['file']['name'],$ext)); //文件名
		
        $ret=$up->upload($newFileName);
        if($ret['code']===0){
            Helper::response('0','http://'.$_SERVER['HTTP_HOST'].'/'.$path.$ret['img']);
        }
    }
}
