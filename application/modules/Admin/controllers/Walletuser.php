<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午11:10
 */

class WalletuserController extends BasicController {
    private function init(){
        Yaf_Registry::get('adminPlugin')->checkLogin();
        Yaf_Registry::get('PermissionPlugin')->checkPermission(true);
        $this->m_admin=$this->load('User');
        $this->m_walletmsg = $this->load('Walletmsg');
        $this->m_actlog = $this->load('actlog');
        $this->m_setting=$this->load('setting');
        $this->globar=Yaf_Registry::get('GlobarPlugin')->getArray_key($this->m_setting->getoptions(),'name');
    }

    public function indexAction(){
		$data=$this->m_walletmsg->Conditions(" AND language_id=1")->getwtype('3');
		foreach($data as $key => $val){
			$val['info']=base64_decode($val['info']);
			$data[$key]=quotes($val);
		}
		
		$this->getView()->assign(array('msg'=>$data));
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
     * 分页获取新闻分类
     */
    public function tabPageAction(){
        try{
        	empty($_POST['current']) ? $params['current']='1' : $params['current']=$_POST['current'];
        	empty($_POST['rowCount']) ? $params['rowCount']=$this->globar['offset']['value'] : $params['rowCount']=$_POST['rowCount'];
			if($_POST['search']=='1'){
				$data['data']=array(
					"0"=>array("id"=>"1","time"=>"2018-03-14","mac"=>"94:C6:91:2E:21:3E","amount"=>"60000.00","balance"=>"1661856.47","award"=>"300","workload"=>"15.23","status"=>"正常"),
					"1"=>array("id"=>"2","time"=>"2018-02-26","mac"=>"30:9C:23:13:9A:B0","amount"=>"0","balance"=>"213165.62","award"=>"100","workload"=>"2.08","status"=>"正常"),
					"2"=>array("id"=>"3","time"=>"2018-02-01","mac"=>"30:9C:23:5B:68:18","amount"=>"450.41","balance"=>"300.39","award"=>"0","workload"=>"0","status"=>"冻结"),
				);
				$data["current"]= empty($_POST['current']) ? '1' : $_POST['current'];
				$data["rowCount"]=empty($_POST['rowCount']) ? '10' : $_POST['rowCount'];
				$data["total"]=ceil(intval('20')/$data["rowCount"]);
			}else{
				$data['data']=array(
					"0"=>array("id"=>"4","time"=>"2018-03-15","mac"=>"94:C6:91:2E:21:3E","amount"=>"60000.00","balance"=>"1661856.47","award"=>"300","workload"=>"15.23","status"=>"正常"),
					"1"=>array("id"=>"5","time"=>"2018-03-13","mac"=>"30:9C:23:13:9A:B0","amount"=>"0","balance"=>"213165.62","award"=>"100","workload"=>"2.08","status"=>"正常"),
					"2"=>array("id"=>"6","time"=>"2018-03-13","mac"=>"30:9C:23:5B:68:18","amount"=>"450.41","balance"=>"300.39","award"=>"0","workload"=>"0","status"=>"冻结"),
				);
				$data["current"]=empty($_POST['current']) ? '1' : $_POST['current'];
				$data["rowCount"]=empty($_POST['rowCount']) ? '10' : $_POST['rowCount'];
				$data["total"]=ceil(intval('50')/$data["rowCount"]);
			}
			
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
	
	
	public function getByIdAction(){
        try{
            $data['zhdata']=$this->m_walletmsg->Conditions(" AND language_id=1")->getArticlebyId($_POST['id']);
            $data['endata']=$this->m_walletmsg->Conditions(" AND language_id=2")->getArticlebyId($_POST['id']);
            $data['kadata']=$this->m_walletmsg->Conditions(" AND language_id=3")->getArticlebyId($_POST['id']);
			foreach($data as $key => $val){
				//$val['info']=base64_decode($val['info']);
				$data[$key]=quotes($val);
			}
			
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
	
	
    public function updateByIdAction(){
        try{
			$uid=$_SESSION['user']['id'];
			$arr['current']=$this->m_admin->getUserById($uid)['login'];
			$arr['c_time']=time();
			$arr['mac']=$arr['mac'];
			if(trim($arr['act'])=='recover'){
				//恢复用户
				$arr['act']='恢复用户';
			}else{
				//冻结用户
				$arr['act']='冻结用户';
			}
			
			$arr['zhinfo']=base64_decode($arr['zh']['info']);
			$arr['eninfo']=base64_decode($arr['en']['info']);
			$arr['kainfo']=base64_decode($arr['ka']['info']);
			unset($arr['files']);
			unset($arr['zh']);
			unset($arr['en']);
			unset($arr['ka']);

			$id=$this->m_actlog->Insert($arr);
			if($id){
				
				$data['code']='0';
				$data['msg']='已发送';
			}else{
				$data['code']='1002';
				$data['msg']='发送失败';
			}
			
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
	
	
	public function excelAction($ex='2007'){
		date_default_timezone_set('PRC');
		ini_set('date.timezone','Asia/Chongqing');
		set_time_limit(0);
		
		Yaf_Loader::import(APP_PATH.'/application/library/PHPExcel.php');
		
		$data['data']=array(
			"0"=>array("id"=>"1","time"=>"2018-03-15","mac"=>"94:C6:91:2E:21:3E","amount"=>"60000.00","balance"=>"1661856.47","award"=>"300","workload"=>"15.23","status"=>"正常"),
			"1"=>array("id"=>"2","time"=>"2018-03-13","mac"=>"30:9C:23:13:9A:B0","amount"=>"0","balance"=>"213165.62","award"=>"100","workload"=>"2.08","status"=>"正常"),
			"2"=>array("id"=>"3","time"=>"2018-03-13","mac"=>"30:9C:23:5B:68:18","amount"=>"450.41","balance"=>"300.39","award"=>"0","workload"=>"0","status"=>"冻结"),
		);
		
		$objExcel = new PHPExcel();
		$objExcel->getDefaultStyle()->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		
		//表头
		$k1="编号";
		$k2="创建时间";
		$k3="MAC地址";
		$k4="历史提币总金额";
		$k5="挖矿余额";
		$k6="今日奖励";
		$k7="工作量";
		$k8="状态";
		$objExcel->getActiveSheet()->setCellValue('a1', "$k1");
		$objExcel->getActiveSheet()->setCellValue('b1', "$k2");
		$objExcel->getActiveSheet()->setCellValue('c1', "$k3");
		$objExcel->getActiveSheet()->setCellValue('d1', "$k4");
		$objExcel->getActiveSheet()->setCellValue('e1', "$k5");
		$objExcel->getActiveSheet()->setCellValue('f1', "$k6");
		$objExcel->getActiveSheet()->setCellValue('g1', "$k7");
		$objExcel->getActiveSheet()->setCellValue('h1', "$k8");
		$i=0;
		foreach($data['data'] as $k=>$v) {
			$u1=$i+2;
			 /*----------写入内容-------------*/
			$objExcel->getActiveSheet()->setCellValue('a'.$u1, $v["id"]);
			$objExcel->getActiveSheet()->setCellValue('b'.$u1, $v['time']);
			$objExcel->getActiveSheet()->setCellValue('c'.$u1, $v['mac']);
			$objExcel->getActiveSheet()->setCellValue('d'.$u1, $v["amount"]);
			$objExcel->getActiveSheet()->setCellValue('e'.$u1, $v['balance']);
			$objExcel->getActiveSheet()->setCellValue('f'.$u1, $v['award']);
			$objExcel->getActiveSheet()->setCellValue('g'.$u1, $v['workload']);
			$objExcel->getActiveSheet()->setCellValue('h'.$u1, $v["status"]);
			$i++;
		}
		
		
		// 高置列的宽度
		$objExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
		$objExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
		$objExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
		$objExcel->getActiveSheet()->getColumnDimension('D')->setWidth(50);
		$objExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
		$objExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
		$objExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
		$objExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
		$objExcel->getActiveSheet()->getHeaderFooter()->setOddHeader('&L&BPersonal cash register&RPrinted on &D');
		$objExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&B' . $objExcel->getProperties()->getTitle() . '&RPage &P of &N');
		
		// 设置页方向和规模
		$objExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
		$objExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
		
		$objExcel->setActiveSheetIndex(0);
		$timestamp = 'wallet用户管理-'.date('Y-m-d H:i:s');//time();
		
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
