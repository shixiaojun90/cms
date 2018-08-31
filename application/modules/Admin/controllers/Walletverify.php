<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午11:10
 */

use Qiniu\json_decode;

class WalletverifyController extends BasicController {
    private function init(){
        Yaf_Registry::get('adminPlugin')->checkLogin();
        Yaf_Registry::get('PermissionPlugin')->checkPermission(true);
        $this->m_admin=$this->load('User');
		$this->m_walletmsg = $this->load('Walletmsg');
        $this->m_actlog = $this->load('actlog');
		
        $this->m_setting=$this->load('setting');
        //$this->basic=Yaf_Loader::import(FUNC_PATH.'/F_Basic.php');
        
        $this->globar=Yaf_Registry::get('GlobarPlugin')->getArray_key($this->m_setting->getoptions(),'name');
        //1代表正式的地址、0代表测试的地址
        if($this->globar['onoff']['value']==1){
        	$this->administrator='ali-administrator';
        	$this->tablisturl=$this->globar['verifylistonurl']['value'];//提币审核列表地址
        	$this->tabconsenturl=$this->globar['verifyconsentonurl']['value'];//提币审核通过地址
        	$this->tabrejecturl=$this->globar['verifyrejectonurl']['value'];//提币审核驳回地址
        }else{
        	$this->administrator='administrator';
        	$this->tablisturl=$this->globar['verifylistoffurl']['value'];//提币审核列表地址
        	$this->tabconsenturl=$this->globar['verifyconsentoffurl']['value'];
        	$this->tabrejecturl=$this->globar['verifyrejectoffurl']['value'];//提币审核驳回地址
        }
    }

    public function indexAction(){
        $this->getView()->assign(array('offset'=>$this->globar['offset']['value']));
    }
	
	public function getmsgAction(){
		try{
			$data=$this->m_walletmsg->Conditions(" AND language_id=1")->getwtype($_POST['wtype']);
			foreach($data as $key => $val){
				$data[$key]['info']=addslashes(base64_decode($val['info']));
			}
			
			Helper::response('0',$data);
		}catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
	
	

    /**
     * 提币审核列表
     */
    public function tabPageAction(){
        try{
        	$params=array_filter($_POST);
        	//$url='http://api.bchunk.com/api/apply/admin/list';
        	//$url='http://10.4.166.31:18080/api/apply/admin/list';
        	empty($_POST['pageIndex']) ? $params['pageIndex']='1' : $params['pageIndex']=$_POST['pageIndex'];
        	empty($_POST['offset']) ? $params['offset']=$this->globar['offset']['value'] : $params['offset']=$_POST['offset'];
        	$params['reqExamineAdmin']=$this->administrator;
            if($_POST['search']=='1'){
				unset($params['search']);
				$msgstatus=executeHTTPRequest($this->tablisturl, json_encode($params), 0, 'json');
			}else{
				$msgstatus=executeHTTPRequest($this->tablisturl, json_encode($params), 0, 'json');
			}
			
			$arr=json_decode($msgstatus,true);
			
			if($arr['code']=='200' && $arr['msg']=='ok'){
				$data=$arr['result'];
			}
			
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
	
    
    public function getArticleByIdAction(){
    	try{
    		$data['zhdata']=addslashes($this->m_walletmsg->Conditions(" AND language_id=1")->getArticlebyId($_POST['id'])['info']);
    		$data['endata']=addslashes($this->m_walletmsg->Conditions(" AND language_id=2")->getArticlebyId($_POST['id'])['info']);
    		$data['kadata']=addslashes($this->m_walletmsg->Conditions(" AND language_id=3")->getArticlebyId($_POST['id'])['info']);
    		//foreach($data as $key => $val){
    		//	$data[$key]=addslashes($val);
    		//}
    			
    		Helper::response('0',$data);
    	}catch (Exception $ex){
    		Helper::response('1006',$ex);
    	}
    }
	
	
	public function updateByIdAction(){
        try{
			$uid=$_SESSION['user']['id'];
			$arr['current']=$this->m_admin->getUserById($uid)['login'];
			$arr['c_time']=date('Y-m-d H:i:s');
			$arr['mac']=trim($_POST['mac']);
			
			empty($_POST['transactionHash']) ? $transactionHash='' : $transactionHash=trim($_POST['transactionHash']);//交易哈希
			$params['reqExamineAdmin']=$this->administrator;
			if(trim($_POST['act'])=='addform-ok'){
				//提现通过
				//$url='http://api.bchunk.com/api/examine/pass';
				//$url='http://10.4.166.31:18080/api/examine/pass';
				$url=$this->tabconsenturl;
				//$params['reqExamineAdmin']='administrator';
				$params['transactionHash']=trim($_POST['transactionHash']);
				$params['type']='4';
				$arr['act']='提现通过';
				$arr['wtype']='1';
				
				$contentCn['title']=$this->m_walletmsg->Conditions(" AND language_id=1")->order(" id desc")->Limit('0,1')->getMsglang('1')['title'];
				$contentEn['title']=$this->m_walletmsg->Conditions(" AND language_id=2")->order(" id desc")->Limit('0,1')->getMsglang('1')['title'];
				$contentKr['title']=$this->m_walletmsg->Conditions(" AND language_id=3")->order(" id desc")->Limit('0,1')->getMsglang('1')['title'];
				
				$contentCn=$this->m_walletmsg->Conditions(" AND language_id=1")->order(" id desc")->Limit('0,1')->getMsglang('1');
				$contentEn=$this->m_walletmsg->Conditions(" AND language_id=2")->order(" id desc")->Limit('0,1')->getMsglang('1');
				$contentKr=$this->m_walletmsg->Conditions(" AND language_id=3")->order(" id desc")->Limit('0,1')->getMsglang('1');
				
				/* $contentCn['info']=base64_encode(base64_decode($contentCn['info']).'交易哈希 ：'.$transactionHash);//中文
				$contentEn['info']=base64_encode(base64_decode($contentEn['info']).'交易哈希 ：'.$transactionHash);//中文
				$contentKr['info']=base64_encode(base64_decode($contentKr['info']).'交易哈希 ：'.$transactionHash);//中文 */
				$contentCn['info']=base64_encode('交易哈希 ：'.$transactionHash);//中文
				$contentEn['info']=base64_encode('transactionHash ：'.$transactionHash);//英文
				$contentKr['info']=base64_encode('거래해시 ：'.$transactionHash);//韩文
			}else{
				//提现驳回
				//$url='http://api.bchunk.com/api/examine/reject';
				//$url='http://10.4.166.31:18080/api/examine/reject';
				$url=$this->tabrejecturl;
				//$params['reqExamineAdmin']='administrator';
				$params['type']='3';
				$arr['act']='提现驳回';
				$arr['wtype']='3';
				$contentCn=$_POST['zh'];
				$contentEn=$_POST['en'];
				$contentKr=$_POST['ka'];
				
				$contentCn['title']=$this->m_walletmsg->Conditions(" AND language_id=1")->order(" id desc")->Limit('0,1')->getMsglang('2')['title'];
				$contentEn['title']=$this->m_walletmsg->Conditions(" AND language_id=2")->order(" id desc")->Limit('0,1')->getMsglang('2')['title'];
				$contentKr['title']=$this->m_walletmsg->Conditions(" AND language_id=3")->order(" id desc")->Limit('0,1')->getMsglang('2')['title'];
			}
			
			
			
			
			$versionid=$this->m_actlog->beginTransaction();
			$arr['zhtitle']=$contentCn['title'];
			$arr['zhinfo']=base64_encode($contentCn['info']);//中文
			
			$arr['entitle']=$contentEn['title'];
			$arr['eninfo']=base64_encode($contentEn['info']);//英文
			
			$arr['katitle']=$contentKr['title'];
			$arr['kainfo']=base64_encode($contentKr['info']);//韩文
			
			$id=$this->m_actlog->Insert($arr);
			if($id){
				$params['id']=trim($_POST['id']);
				$params['recipient']=trim($_POST['aacMacId']);
				
				//查询通过模板消息
				
				$params['titleCn']=$contentCn['title'];
				$params['contentCn']=$contentCn['info'];//中文
				
				$params['titleEn']=$contentEn['title'];
				$params['contentEn']=$contentEn['info'];//英文
				
				$params['titleKr']=$contentKr['title'];
				$params['contentKr']=$contentKr['info'];//韩文
				
				$adminname=$this->m_admin->getUserById($_SESSION['user']['id'])['login'];
				$params['aacAdmin']=$adminname;

				$msgstatus=executeHTTPRequest($url, json_encode($params), 0, 'json');
				$msgcall=json_decode($msgstatus,true);
				
				if($msgcall['code']=='200'){
					//成功
					$this->m_actlog->Commit();
					Helper::response('0',$data);
				}else{
					$this->m_actlog->Rollback();
					$data['code']='1002';
					$data['msg']=$msgcall['msg'];
					Helper::response($data);
				}
			}else{
				print_r('1002');
				$this->m_actlog->Rollback();
				$data['code']='1002';
				$data['msg']='发送失败';
				Helper::response($data);
			}
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

    public function excelAction($ex='2007'){
    	date_default_timezone_set('PRC');
    	ini_set('date.timezone','Asia/Chongqing');
    	set_time_limit(0);
    
    	Yaf_Loader::import(APP_PATH.'/application/library/PHPExcel.php');
    	
    	$url=$this->tablisturl;
    	empty($_POST['pageIndex']) ? $params['pageIndex']='1' : $params['pageIndex']=$_POST['pageIndex'];
    	empty($_POST['offset']) ? $params['offset']='1000000' : $params['offset']=$_POST['offset'];
    	$params['reqExamineAdmin']=$this->administrator;
    	$msgstatus=executeHTTPRequest($url, json_encode($params), 0, 'json');
    		
    	$links_list=json_decode($msgstatus,true);
    	
    	$objExcel = new PHPExcel();
    
    	//$objExcel->setActiveSheetIndex(0);
    	$objExcel->getDefaultStyle()->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    
    	//表头
    	$k1="编号";
    	$k2="MAC地址";
    	$k3="公钥地址";
    	$k4="历史提币总金额";
    	$k5="提币金额";
    	$k6="挖矿余额";
    	$k7="申请时间";

    	$objExcel->getActiveSheet()->setCellValue('a1', "$k1");
    	$objExcel->getActiveSheet()->setCellValue('b1', "$k2");
    	$objExcel->getActiveSheet()->setCellValue('c1', "$k3");
    	$objExcel->getActiveSheet()->setCellValue('d1', "$k4");
    	$objExcel->getActiveSheet()->setCellValue('e1', "$k5");
    	$objExcel->getActiveSheet()->setCellValue('f1', "$k6");
    	$objExcel->getActiveSheet()->setCellValue('g1', "$k7");
		
    	$i=0;
    	foreach($links_list['result']['pageData'] as $k=>$v) {
    		$u1=$i+2;
    		/*----------写入内容-------------*/
    		$objExcel->getActiveSheet()->setCellValue('a'.$u1, $v["id"]);
    		$objExcel->getActiveSheet()->setCellValue('b'.$u1, $v["aacMacAddress"]);
    		$objExcel->getActiveSheet()->setCellValue('c'.$u1, $v['publicAddress']);
    		$objExcel->getActiveSheet()->setCellValue('d'.$u1, $v["aacApplyTotal"]);
    		$objExcel->getActiveSheet()->setCellValue('e'.$u1, $v['aacNumber']);
    		$objExcel->getActiveSheet()->setCellValue('f'.$u1, $v["aacMinerBalance"]);
    		$objExcel->getActiveSheet()->setCellValue('g'.$u1, $v['createTime']);
    		$i++;
    	}
    
    	// 高置列的宽度
    	$objExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
    	$objExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
    	$objExcel->getActiveSheet()->getColumnDimension('C')->setWidth(50);
    	$objExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
    	$objExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
    	$objExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
    	$objExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);

    	$objExcel->getActiveSheet()->getHeaderFooter()->setOddHeader('&L&BPersonal cash register&RPrinted on &D');
    	$objExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&B' . $objExcel->getProperties()->getTitle() . '&RPage &P of &N');
    
    	// 设置页方向和规模
    	$objExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
    	$objExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
    
    	$objExcel->setActiveSheetIndex(0);
    	$timestamp = 'wallet提币审核-'.date('Y-m-d H:i:s');//time();
    
    	if($ex == '2007') { //导出excel2007文档
    		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    		header('Content-Disposition: attachment;filename="'.$timestamp.'.xlsx"');
    		header('Cache-Control: max-age=0');
    		$objWriter = PHPExcel_IOFactory::createWriter($objExcel, 'Excel2007');
    		$objWriter->save('php://output');
    		//exit;
    	} else { //导出excel2003文档
    		header('Content-Type: application/vnd.ms-excel');
    		header('Content-Disposition: attachment;filename="links_out'.$timestamp.'.xls"');
    		header('Cache-Control: max-age=0');
    		$objWriter = PHPExcel_IOFactory::createWriter($objExcel, 'Excel5');
    		$objWriter->save('php://output');
    		exit;
    	}
		Yaf_Dispatcher::getInstance()->autoRender(false);
    }
}
