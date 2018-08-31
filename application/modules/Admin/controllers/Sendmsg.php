<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午11:10
 */

class SendmsgController extends BasicController {
    private function init(){
        Yaf_Registry::get('adminPlugin')->checkLogin();
        Yaf_Registry::get('PermissionPlugin')->checkPermission(true);
        $this->m_admin=$this->load('User');
        $this->m_audit = $this->load('Audit');
        $this->m_sendmsg = $this->load('sendmsg');
		$this->m_actlog = $this->load('actlog');
		//$this->basic=Yaf_Loader::import(FUNC_PATH.'/F_Basic.php');
		$this->m_setting=$this->load('setting');
		$this->globar=Yaf_Registry::get('GlobarPlugin')->getArray_key($this->m_setting->getoptions(),'name');
		//1代表正式的地址、0代表测试的地址
		if($this->globar['onoff']['value']==1){
			$this->administrator='ali-administrator';
			$this->msgurl=$this->globar['msgoffurl']['value'];//公告地址
		}else{
			$this->administrator='administrator';
			$this->msgurl=$this->globar['msgoffurl']['value'];//公告地址
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
			$data=$this->m_sendmsg->Conditions(" AND language_id=1")->getArtListByPage($_POST['rowCount'],$_POST['current'],$sort,$_POST['searchPhrase'],'(language_id=1)');
			
			foreach ($data['data'] as $key=>$val){
                $data['data'][$key]['creater']=$this->m_admin->getUserById($val['creater'])['login'];
                $data['data'][$key]['c_time']=date("Y-m-d H:i:s",$val['c_time']);
                $data['data'][$key]['info']=mb_substr(stripHTML(stripslashes(base64_decode($val['info']))),0,30).'...';
            }
			
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
	
	
	public function addAction(){
        try{
        	
            //添加
			$list=$_POST;
			unset($list['files']);
			unset($list['id']);
			unset($list['version']);
			unset($list['url']);
			/*******
			wtype1代表提现通过2代表提现驳回3代表冻结用户4代表恢复用户，5代表版本管理，6代表公告管理
			*******/
			
			$auditid=$this->m_audit->Insert(array('c_time'=>time(),'uid'=>$_SESSION['user']['id']));
				
			
			if($auditid){
				$versionid=$this->m_sendmsg->beginTransaction();
				foreach($list as $key => $val){
					if(is_array($val)){
						$val['id']=$auditid;
						$val['creater']=$_SESSION['user']['id'];
						$val['c_time']=time();
						$insertid=$this->m_sendmsg->Insertsetfield($val);
					}
				}
				
				/******向java后端抛送数据*******/
				$url=$this->msgurl;
				//$url='http://api.bchunk.com/api/message/announce/add';
				//wtype1代表填写通过2代表填写驳回3代表冻结用户4代表恢复用户,5消息公告,6版本更新
				$adminname=$this->m_admin->getUserById($_SESSION['user']['id'])['login'];
				$params['type']='公告管理';//$type[$list['type']];
				$params['operator']=$adminname;
				$params['titleCn']=$list['zh']['title'];
				$params['contentCn']=$list['zh']['info'];
				$params['titleEn']=$list['en']['title'];
				$params['contentEn']=$list['en']['info'];
				$params['titleKr']=$list['ka']['title'];
				$params['contentKr']=$list['ka']['info'];
				
				
				$msgstatus=executeHTTPRequest($url, json_encode($params), 0, 'json');
				$res=json_decode($msgstatus,true);
				//print_r(json_encode($params));
				if($res['code']=='200'){
					/*****记录操作日志*******/
					$uid=$_SESSION['user']['id'];
					$logarr['current']=$this->m_admin->getUserById($uid)['login'];
					$logarr['c_time']=date('Y-m-d H:i:s');
					$logarr['wtype']='5';//消息公告
					$logarr['act']='消息公告';//消息公告
					$logarr['zhtitle']=$list['zh']['title'];
					$logarr['zhinfo']=base64_decode($list['zh']['info']);
					
					$logarr['entitle']=$list['en']['title'];
					$logarr['eninfo']=base64_decode($list['en']['info']);
					
					$logarr['katitle']=$list['ka']['title'];
					$logarr['kainfo']=base64_decode($list['ka']['info']);
					
					$logarr['jetitle']=$list['je']['title'];
					$logarr['jeinfo']=base64_decode($list['je']['info']);
						
					$actlogid=$this->m_actlog->Insert($logarr);
					$this->m_sendmsg->Commit();
					Helper::response('0',$data);
				}else{
					$this->m_sendmsg->Rollback();
					$error['code']='1002';
					$error['msg']=$res['msg'];
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
	
	
	public function getByIdAction(){
        try{
			
            $data['zhdata']=$this->m_sendmsg->Conditions(" AND language_id=1")->getArticlebyId($_POST['id']);
            $data['endata']=$this->m_sendmsg->Conditions(" AND language_id=2")->getArticlebyId($_POST['id']);
            $data['kadata']=$this->m_sendmsg->Conditions(" AND language_id=3")->getArticlebyId($_POST['id']);
            $data['jedata']=$this->m_sendmsg->Conditions(" AND language_id=4")->getArticlebyId($_POST['id']);
            
        	foreach ($data as $key => $val){
        		if(is_array($val)){
        			$data['c_time']=date('Y-m-d H:i:s',$val['c_time']);
        			$val['info']=base64_decode($val['info']);
        			foreach ($val as $lk => $lv){
        				$val[$lk]=strip_tags(addslashes($lv));
        			}
        		}
    			$data[$key]=$val;
    		}
			
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
	
	
	
	public function deleteAction(){
        try{
            //$versionid=$this->m_sendmsg->Where(array('id'=>$_POST['id']))->Delete();
        	$data['code']='1002';
        	$data['msg']='暂时不能删除';
            Helper::response($data);
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
