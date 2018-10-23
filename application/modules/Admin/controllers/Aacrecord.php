<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午11:10
 */

class AacrecordController extends BasicController {
    private function init(){
        Yaf_Registry::get('adminPlugin')->checkLogin();
        Yaf_Registry::get('PermissionPlugin')->checkPermission();
        $this->m_aacrecord=$this->load('aacrecord');
       
    }

    public function indexAction(){
       // $this->getView()->assign(array('artType'=>$this->m_article->Select()));
    }

    /**
     * 分页获取新闻分类
     */
    public function tabPageAction(){
        try{
            //查询
			$sort='id desc';
            $data=$this->m_aacrecord->getAppemailPage($_POST['rowCount'],$_POST['current'],$sort,$_POST['searchPhrase'],null);
            
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
            $result = $this->m_aacrecord->DeleteByID($_POST['id']);
           
            Helper::response('0',$result);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
	
	public function excelAction($ex='2007'){
		date_default_timezone_set('PRC');
		ini_set('date.timezone','Asia/Chongqing');
		set_time_limit(0);
		
		Yaf_Loader::import(APP_PATH.'/application/library/PHPExcel.php');
		//Yaf_Loader::import(APP_PATH.'/application/library/phpExcel/Writer/Excel2007.php');
		//Yaf_Loader::import(APP_PATH.'/application/library/phpExcel/Writer/Excel5.php');
		//Yaf_Loader::import(APP_PATH.'/application/library/phpExcel/IOFactory.php');
		//查询
		
        $links_list=$this->m_aacrecord->excelrecord();
		
		$objExcel = new PHPExcel();
		
		//$objExcel->setActiveSheetIndex(0);
		
		
		//表头
		$k1="编号";
		$k2="记录说明";
		
		$objExcel->getActiveSheet()->setCellValue('a1', "$k1");
		$objExcel->getActiveSheet()->setCellValue('b1', "$k2");

		$i=0;
		foreach($links_list as $k=>$v) {
		  $u1=$i+2;
		  /*----------写入内容-------------*/
		  $objExcel->getActiveSheet()->setCellValue('a'.$u1, $v["id"]);
		  $objExcel->getActiveSheet()->setCellValue('b'.$u1, $v["remark"]);
		  $i++;
		}
		
		
		// 高置列的宽度
		$objExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
		$objExcel->getActiveSheet()->getColumnDimension('B')->setWidth(50);
		
		$objExcel->getActiveSheet()->getHeaderFooter()->setOddHeader('&L&BPersonal cash register&RPrinted on &D');
		$objExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&B' . $objExcel->getProperties()->getTitle() . '&RPage &P of &N');
		
		// 设置页方向和规模
		$objExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
		$objExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
		
		$objExcel->setActiveSheetIndex(0);
		$timestamp = time();
		
		if($ex == '2007') { //导出excel2007文档
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="links_out'.$timestamp.'.xlsx"');
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
