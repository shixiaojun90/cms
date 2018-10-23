<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 下午2:29
 */
class EmailController extends BasicController
{
   private function init()
    {
        $this->m_email=$this->load('Email');
        $this->m_Success = $this->load('Success');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
    }

    public function submitAction(){
    	
        try{
            //查询
			
			if(preg_match('/^[_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,4}$/', $_POST['email'])){
				$email=$this->m_email->getEmail($_POST['email']);
				
				if($email){
					$code='201';
				}else{
					isset($_POST['host']) ? $host=$_POST['host'] : $host=2;
					$falg=$this->m_email->Insert(array('email'=>$_POST['email'],'host'=>$host,'c_time'=>time()));
					
					if($falg){
						$code='0';
					}else{
						$code='400';
					}
				}
			}else{
				$code='304';
			}
			
            Helper::response($code,'');
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
		
        $links_list=$this->m_email->excelEmail();
		
		$objExcel = new PHPExcel();
		
		//$objExcel->setActiveSheetIndex(0);
		
		
		//表头
		$k1="编号";
		$k2="Email";
		$k3="时间";
		$k4="来源";
		$objExcel->getActiveSheet()->setCellValue('a1', "$k1");
		$objExcel->getActiveSheet()->setCellValue('b1', "$k2");
		$objExcel->getActiveSheet()->setCellValue('c1', "$k3");
		$objExcel->getActiveSheet()->setCellValue('d1', "$k4");
		$i=0;
		foreach($links_list as $k=>$v) {
		  $u1=$i+2;
		  /*----------写入内容-------------*/
		  $objExcel->getActiveSheet()->setCellValue('a'.$u1, $v["id"]);
		  $objExcel->getActiveSheet()->setCellValue('b'.$u1, $v["email"]);
		  $objExcel->getActiveSheet()->setCellValue('c'.$u1, date('Y-m-d H:i:s',$v["c_time"]));
		  $objExcel->getActiveSheet()->setCellValue('d'.$u1, $v["host"]);
		  $i++;
		}
		
		
		// 高置列的宽度
		$objExcel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
		$objExcel->getActiveSheet()->getColumnDimension('B')->setWidth(50);
		$objExcel->getActiveSheet()->getColumnDimension('C')->setWidth(50);
		$objExcel->getActiveSheet()->getColumnDimension('D')->setWidth(50);
		$objExcel->getActiveSheet()->getColumnDimension('E')->setWidth(50);
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
