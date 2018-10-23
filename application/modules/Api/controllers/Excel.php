<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午11:10
 */

class ExcelController extends BasicController {
    private function init(){
        $this->m_register=$this->load('register');
        $this->m_order=$this->load('order');
    }

   
    /**
     * 分页获取新闻分类
     */
    public function saveAction(){
        try{
			Yaf_Loader::import(APP_PATH.'/application/library/PHPExcel.php');
            $objReader = PHPExcel_IOFactory::createReader('Excel5');//use excel2007 for 2007 format 
			//接收存在缓存中的excel表格
			$filename = $_FILES['excel']['tmp_name'];
			$objPHPExcel = $objReader->load($filename); //$filename可以是上传的表格，或者是指定的表格
			$sheet = $objPHPExcel->getSheet(0); 
			$highestRow = $sheet->getHighestRow(); // 取得总行数 
			// $highestColumn = $sheet->getHighestColumn(); // 取得总列数
			
			//循环读取excel表格,读取一条,插入一条
			//j表示从哪一行开始读取  从第二行开始读取，因为第一行是标题不保存
			//$a表示列号
			$str='';
			for($j=2;$j<=$highestRow;$j++)  
			{
				$a = $objPHPExcel->getActiveSheet()->getCell("A".$j)->getValue();//获取用户的email
				$email=$this->m_register->getUserByname($a);
				if(!empty($email)){
					$email=$this->m_register->getUserByname($a);
					$orderinfo=$this->m_register->saveorder($email['id']);
				}
				if(!empty($orderinfo)){
					///
				}
				$b = $objPHPExcel->getActiveSheet()->getCell("B".$j)->getValue();//获取B(密码)列的值
				$c = $objPHPExcel->getActiveSheet()->getCell("C".$j)->getValue();//获取C(手机号)列的值
				$d = $objPHPExcel->getActiveSheet()->getCell("D".$j)->getValue();//获取D(地址)列的值
				$e = $objPHPExcel->getActiveSheet()->getCell("E".$j)->getValue();//获取D(地址)列的值
				$f = $objPHPExcel->getActiveSheet()->getCell("F".$j)->getValue();//获取D(地址)列的值
				$g = $objPHPExcel->getActiveSheet()->getCell("G".$j)->getValue();//获取D(地址)列的值
				$h = $objPHPExcel->getActiveSheet()->getCell("H".$j)->getValue();//获取D(地址)列的值
				$i = $objPHPExcel->getActiveSheet()->getCell("I".$j)->getValue();//获取D(地址)列的值
				//null 为主键id，自增可用null表示自动添加
				//$sql = "INSERT INTO house VALUES(null,'$a','$b','$c','$d')";
				//echo $sql;
				//echo "<br>";
				// exit();
				//$res = mysql_query($sql);
				$str.='"'.$c.'"'.',';
			}
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }

    

}
