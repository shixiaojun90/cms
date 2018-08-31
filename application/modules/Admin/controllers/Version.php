<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午11:10
 */

class VersionController extends BasicController {
    private function init(){
        Yaf_Registry::get('adminPlugin')->checkLogin();
        Yaf_Registry::get('PermissionPlugin')->checkPermission(true);
        $this->m_admin=$this->load('User');
        $this->m_audit = $this->load('Audit');
        $this->m_version = $this->load('version');
        $this->m_versionurl = $this->load('versionurl');
		$this->m_actlog = $this->load('actlog');
		//$this->basic=Yaf_Loader::import(FUNC_PATH.'/F_Basic.php');
		session_start();
		$this->m_setting=$this->load('setting');
		$this->globar=Yaf_Registry::get('GlobarPlugin')->getArray_key($this->m_setting->getoptions(),'name');
		//1代表正式的地址、0代表测试的地址
		if($this->globar['onoff']['value']==1){
			$this->administrator='ali-administrator';
			$this->versionurl=$this->globar['versionoffurl']['value'];//版本管理地址
		}else{
			$this->administrator='administrator';
			$this->versionurl=$this->globar['versionoffurl']['value'];//版本管理地址
		}
    }

    public function indexAction(){
        $this->getView()->assign(array('offset'=>$this->globar['offset']['value']));
    }
	
    /**
     * 分页获取新闻分类
     */
    public function tabPageAction(){
        try{
			$sort=' id desc';
			$data=$this->m_version->Conditions(" AND language_id=1")->getArtListByPage($_POST['rowCount'],$_POST['current'],$sort,$_POST['searchPhrase'],'(language_id=1)');
			
			foreach ($data['data'] as $key=>$val){
                $data['data'][$key]['uid']=$this->m_admin->getUserById($val['uid'])['login'];
                $version=quotes($this->m_versionurl->getversionid($val['id']));
                $data['data'][$key]['version']=$version['version'];
                $data['data'][$key]['url']=$version['url'];
                $data['data'][$key]['c_time']=date("Y-m-d H:i:s",$val['c_time']);
                $data['data'][$key]['u_time']=date("Y-m-d H:i:s",$val['u_time']);
                $data['data'][$key]['context']=base64_decode($val['context']);
            }
			
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
	
	
	public function addAction(){
        try{
        	date_default_timezone_set('PRC');
        	ini_set('date.timezone','Asia/Chongqing');
        	set_time_limit(0);
        	ini_set('memory_limit','1024M');
            //添加
			$list=$_POST;
			unset($list['files']);
			unset($list['id']);
			unset($list['version']);
			unset($list['url']);
			unset($list['status']);
			unset($list['type']);
			
			$version=$this->m_versionurl->getversion(trim($_POST['version']));
			
			if(!empty($version['version'])){
				$error['code']='1002';
				$error['msg']='版本号重复';
				Helper::response($error);
			}
			
			$auditid=$this->m_audit->Insert(array('c_time'=>time(),'uid'=>$_SESSION['user']['id']));
			

			if($auditid){
				$versionid=$this->m_version->beginTransaction();
				foreach($list as $key => $val){
					if(is_array($val)){
						$val['id']=$auditid;
						$val['uid']=$_SESSION['user']['id'];
						$val['c_time']=time();
						$insertid=$this->m_version->Insertsetfield($val);
					}
				}
				
				$versionurlid=$this->m_versionurl->Insert(array('version'=>$_POST['version'],'build'=>$_POST['build'],'url'=>trim($_POST['url']),'c_time'=>time(),'vid'=>$auditid));
				if($versionurlid){
					/*****记录操作日志*******/
					$uid=$_SESSION['user']['id'];
					$logarr['current']=$this->m_admin->getUserById($uid)['login'];
					$logarr['c_time']=time();
					$logarr['wtype']='6';//版本管理
					$logarr['act']='版本更新';//版本管理
					$logarr['zhinfo']=$list['zh']['info'];
					$logarr['eninfo']=$list['en']['info'];
					$logarr['kainfo']=$list['ka']['info'];
					
					$actlogid=$this->m_actlog->Insert($logarr);
					
					/******向java后端抛送数据*******/
					
					$adminname=$this->m_admin->getUserById($_SESSION['user']['id'])['login'];
					$params['build']=$_POST['build'];
					$params['version']=$_POST['version'];
					$params['url']=$_POST['url'];
					$params['contentCn']=$list['zh']['info'];
					$params['contentEn']=$list['en']['info'];
					$params['contentKr']=$list['ka']['info'];
					
					$msgstatus=executeHTTPRequest($this->versionurl, json_encode($params), 0, 'json');
					$res=json_decode($msgstatus,true);
					
					if($res['code']=='200'){
						//更新url
						$versionid=$this->m_versionurl->UpdateByID(array("url"=>$_POST['url']),$versionurlid);
						$this->m_version->Commit();
						Helper::response('0',$data);
					}else{
						$this->m_version->Rollback();
						$error['code']='1002';
						$error['msg']=$res['msg'];
						Helper::response($error);
					}
					$this->m_version->Commit();
				}else{
					$this->m_version->Rollback();
					$error['code']='1002';
					$error['msg']='添加失败';
					Helper::response($error);
				}
			}else{
				$error['code']='1002';
				$error['msg']='添加失败';
				Helper::response($error);
			}
			
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
    
    
    public function uploadAction(){
    	try{
	    	$path='upload/wallet/';
	    	if(!empty($_FILES)){
	    		$up = new Upload($_FILES['upload'], $path);
	    		$extpos = strrpos($_FILES['upload']['name'],'.');//返回字符串filename中'.'号最后一次出现的数字位置
	    		$ext = substr($_FILES['upload']['name'],$extpos+1);
	    		$newFileName = pathinfo($_FILES['upload']['name'])['filename'].'-'.trim($_POST['version']).$ext; //文件名
	    		$src='http://'.$_SERVER['HTTP_HOST'].'/'.$path.$up->upload($newFileName)['img'];
	    		$json['error']=0;
	    		$json['src']=$src;
	    		Helper::response($json);
	    	}
    	}catch (Exception $ex){
    		Helper::response('1006',$ex);
    	}
    }
    
    /*public function uploadAction(){
    	try{
			Yaf_loader::import(LIB_PATH . '/Wasfile.php');
			$Wasfile = new Wasfile;
			$fileurl=$Wasfile->uploadpic(trim($_POST['version']));
			print_r($fileurl);
    	}catch (Exception $ex){
    		Helper::response('1006',$ex);
    	}
    }*/
    
    public function progressAction(){
    	try{
	    	$i = ini_get('session.upload_progress.name');
			$key = ini_get("session.upload_progress.prefix") . $_GET[$i];
			//$_SESSION[$key]['cancel_upload'] = true中断上传
			if (!empty($_SESSION[$key])) {
				$current = $_SESSION[$key]["bytes_processed"];
				$total = $_SESSION[$key]["content_length"];
				$current < $total ? $progress=ceil($current / $total * 100) : $progress=100;
			}else{
				$progress=100;
			}
			$data['code']='0';
			$data['progress']=$progress;
    		Helper::response($data);
    	}catch (Exception $ex){
    		Helper::response('1006',$ex);
    	}
    }
	
	
	public function getArticleByIdAction(){
        try{
			
            $data['zhdata']=$this->m_version->Conditions(" AND language_id=1")->getArticlebyId($_POST['id']);
            $data['endata']=$this->m_version->Conditions(" AND language_id=2")->getArticlebyId($_POST['id']);
            $data['kadata']=$this->m_version->Conditions(" AND language_id=3")->getArticlebyId($_POST['id']);
			foreach($data as $key => $val){
				$data[$key]=quotes($val);
			}
			
			$version=$this->m_versionurl->getversionid($_POST['id']);
			$data['version']=$version['version'];
            $data['url']=addslashes($version['url']);
			
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }

	
    public function deleteAction(){
    	try{
    		$versionid=$this->m_version->Where(array('id'=>$_POST['id']))->Delete();
    		if($versionid){
    			$this->m_versionurl->Where(array('vid'=>$_POST['id']))->Delete();
    		}
    
    		Helper::response('0',$result);
    	}catch (Exception $ex){
    		Helper::response('1006',$ex);
    	}
    }
    
    
	/**
     * 上传图片
     */
    public function uploadimgAction(){
        $path='upload/wallet/';
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
