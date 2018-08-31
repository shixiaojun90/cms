<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午11:10
 */

class WalletfindController extends BasicController {
    private function init(){
        Yaf_Registry::get('adminPlugin')->checkLogin();
        Yaf_Registry::get('PermissionPlugin')->checkPermission(true);
        $this->m_admin=$this->load('User');
        $this->m_setting=$this->load('setting');
		//$this->basic=Yaf_Loader::import(FUNC_PATH.'/F_Basic.php');
		
        $this->globar=Yaf_Registry::get('GlobarPlugin')->getArray_key($this->m_setting->getoptions(),'name');
        //1代表正式的地址、0代表测试的地址
        if($this->globar['onoff']['value']==1){
        	$this->administrator='ali-administrator';
        	$this->tablisturl=$this->globar['findonurl']['value'];
        }else{
        	$this->administrator='administrator';
        	$this->tablisturl=$this->globar['findoffurl']['value'];
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
        	$params=array_filter($_POST);
        	
        	
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
    
    
    
    
    public function excelAction($ex='2007'){
    	date_default_timezone_set('PRC');
    	ini_set('date.timezone','Asia/Chongqing');
    	set_time_limit(0);
    
    	Yaf_Loader::import(APP_PATH.'/application/library/PHPExcel.php');
    	//$url='http://api.beenews.cn/api/examine/admin/list';
    	//$url='http://10.4.166.31:18080/api/examine/admin/list';
    	empty($_POST['pageIndex']) ? $params['pageIndex']='1' : $params['pageIndex']=$_POST['pageIndex'];
    	empty($_POST['offset']) ? $params['offset']='1000000' : $params['offset']=$_POST['offset'];
    	$params['reqExamineAdmin']=$this->administrator;
    	//$msgstatus=executeHTTPRequest($this->tablisturl, json_encode($params), 0, 'json');
    
    	if($_POST['search']=='1'){
    		unset($params['search']);
    		$msgstatus=executeHTTPRequest($this->tablisturl, json_encode($params), 0, 'json');
    	}else{
    		$msgstatus=executeHTTPRequest($this->tablisturl, json_encode($params), 0, 'json');
    	}
    	
    	$links_list=json_decode($msgstatus,true);
    	 
    	$objExcel = new PHPExcel();
    
    	//$objExcel->setActiveSheetIndex(0);
    	$objExcel->getDefaultStyle()->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    
    	//表头
    	$k1="MAC地址";
    	$k2="公钥地址";
    	$k3="交易号";
    	$k4="提币总金额";
    	$k5="提币金额";
    	$k6="挖矿余额";
    	$k7="操作时间";
    	$k8="操作人";
    	$k9="用户状态";
    	$k10="审核状态";
    
    	$objExcel->getActiveSheet()->setCellValue('a1', "$k1");
    	$objExcel->getActiveSheet()->setCellValue('b1', "$k2");
    	$objExcel->getActiveSheet()->setCellValue('c1', "$k3");
    	$objExcel->getActiveSheet()->setCellValue('d1', "$k4");
    	$objExcel->getActiveSheet()->setCellValue('e1', "$k5");
    	$objExcel->getActiveSheet()->setCellValue('f1', "$k6");
    	$objExcel->getActiveSheet()->setCellValue('g1', "$k7");
    	$objExcel->getActiveSheet()->setCellValue('h1', "$k8");
    	$objExcel->getActiveSheet()->setCellValue('i1', "$k9");
    	$objExcel->getActiveSheet()->setCellValue('j1', "$k10");
    
    	$i=0;
    	foreach($links_list['result']['pageData'] as $k=>$v) {
    		$u1=$i+2;
    		/*----------写入内容-------------*/
    		$aacApplyStatus=array('D'=>'待审核','N'=>'已驳回','Y'=>'已通过');
    		$aacMacStatus=array('N'=>'未冻结','Y'=>'已冻结');
    		
    		$objExcel->getActiveSheet()->setCellValue('a'.$u1, $v["aacMac"]);
    		$objExcel->getActiveSheet()->setCellValue('b'.$u1, $v["publicAddress"]);
    		$objExcel->getActiveSheet()->setCellValue('c'.$u1, $v['transactionHash']);
    		$objExcel->getActiveSheet()->setCellValue('d'.$u1, $v["aacApplyTotal"]);
    		$objExcel->getActiveSheet()->setCellValue('e'.$u1, $v['aacNumber']);
    		$objExcel->getActiveSheet()->setCellValue('f'.$u1, $v["aacMinerBalance"]);
    		$objExcel->getActiveSheet()->setCellValue('g'.$u1, $v['createTime']);
    		$objExcel->getActiveSheet()->setCellValue('h'.$u1, $v['aacAdmin']);
    		$objExcel->getActiveSheet()->setCellValue('i'.$u1, $aacMacStatus[$v['aacMacStatus']]);
    		$objExcel->getActiveSheet()->setCellValue('j'.$u1, $aacApplyStatus[$v['aacApplyStatus']]);
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
    	$objExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
    	$objExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
    	$objExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
    
    	$objExcel->getActiveSheet()->getHeaderFooter()->setOddHeader('&L&BPersonal cash register&RPrinted on &D');
    	$objExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&B' . $objExcel->getProperties()->getTitle() . '&RPage &P of &N');
    
    	// 设置页方向和规模
    	$objExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
    	$objExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
    
    	$objExcel->setActiveSheetIndex(0);
    	$timestamp = 'wallet提币查询-'.date('Y-m-d H:i:s');//time();
    
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
    }
	
}
