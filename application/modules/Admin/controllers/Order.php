<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午11:10
 */

class OrderController extends BasicController {
    private function init(){
        Yaf_Registry::get('adminPlugin')->checkLogin();
        Yaf_Registry::get('PermissionPlugin')->checkPermission();
        $this->m_admin=$this->load('User');
		$this->m_register=$this->load('Register');
        $this->m_order = $this->load('order');
        $this->m_logistics = $this->load('logistics');
		$this->m_setting=$this->load('setting');
		$this->basic=Yaf_Loader::import(FUNC_PATH.'/F_Basic.php');
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
			$sort='status asc,id desc';
			//根据用户id查询用户所有订单
			if(preg_match("/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i", $_POST['searchPhrase'])){
				$user=$this->m_register->getUserByname($_POST['searchPhrase']);
				if(!empty($user)){
					$data=$this->m_order->saveorder($user['id']);
					foreach ($data as $key=>$val){
						$data[$key]['pay_hash']=trim($val['pay_hash']);
						$data[$key]['modeinfo']=unserialize($val['modeinfo']);
						$data[$key]['creater']=$this->m_admin->getUserById($val['creater'])['login'];
						$data[$key]['email']=$this->m_register->getUserById($val['uid'])['email'];
					}
					$data['data']=quotes($data);
				}
			}else{
				$data=$this->m_order->getOrderListByPage($_POST['rowCount'],$_POST['current'],$sort,$_POST['searchPhrase'],null);
				foreach ($data['data'] as $key=>$val){
					$data['data'][$key]['pay_hash']=trim($val['pay_hash']);
					$data['data'][$key]['modeinfo']=unserialize($val['modeinfo']);
					$data['data'][$key]['creater']=$this->m_admin->getUserById($val['creater'])['login'];
					$data['data'][$key]['email']=$this->m_register->getUserById($val['uid'])['email'];
				}
				$data['data']=quotes($data['data']);
			}
			
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }

    public function getArticleByIdAction(){
        try{
            //查询
            $data=$this->m_order->getOrderInfobyId($_GET['id']);
			if(!empty($data['modeinfo'])){
				$data['modeinfo']=unserialize($data['modeinfo']);
				$data['logistics']=$this->m_logistics->getLogisticsOid($data['id']);
			}
			//$data=$this->m_articleinfo->getArticlebyId($_GET['id']);
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }

    public function addAction(){
        try{
            //添加
			$user=$this->m_register->getUserByname($_POST['email']);
			if(!empty($user)){
				$ret=$_POST;
				if($ret['bname']!='USD'){
					if(empty($ret['order_id'])){
						$ret['order_id']=oddnumbers(10).$user['id'];
					}
				}
				$ret['uid']=$user['id'];
				unset($ret['email']);
				$id=$this->m_order->Insert($ret);
			}
            
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
            $result = $this->m_order->DeleteByID($_POST['id']);
            //$this->m_audit->Where(array('audit_id'=>$_POST['id']))->Delete();
            Helper::response('0',$result);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
	
	public function saveAction(){
		$this->getView()->assign(array('logistics'=>$this->m_logistics->Select()));
	}
	
    public function updateByIdAction(){
        try{
            $ret=$_POST;
            $ret['creater']=$_SESSION['user']['id'];
            
			$logistics=$_POST['logistics'];
			$modeinfo=$_POST['modeinfo'];
			unset($ret['logistics']);
			unset($ret['modeinfo']);
            
			$orderinfo=$this->m_order->getOrderInfobyId($_POST['id']);
			if($_POST['status'] != 4){
				if($orderinfo['status']==3){
					$error['code']='1002';
					$error['msg']='已完成订单，不能修改';
					Helper::response($error);
				}
				$count=$this->m_order->getadminCount($orderinfo['id']);
				if($count[0]['count'] >= 5){
					if(($orderinfo['status']+1)!=$_POST['status']){
						$error['code']='1002';
						$error['msg']='用户订购数量超过5次，请确认后撤销';
						Helper::response($error);
					}
				}
				
				/*if($_POST['status'] != $orderinfo['status']){
					$msg=array('0'=>'交易中','1'=>'已付款','2'=>'配送中','3'=>'已完成');
					if(($orderinfo['status']+1)!=$_POST['status']){
						$error['code']='1002';
						$error['msg']='请修改状态为'.$msg[$orderinfo['status']+1];
						Helper::response($error);
					}
				}*/
				
				
				if($_POST['status'] < $orderinfo['status']){
					$error['code']='1002';
					$error['msg']='不能修改到上一步状态';
					Helper::response($error);
				}
				
				if(!empty($modeinfo['modes']) || !empty($modeinfo['freight']) || !empty($modeinfo['lname']) || !empty($modeinfo['pay_time']) || !empty($modeinfo['msorder'])){
					//添加物流信息
					if($_POST['status'] == 0){
						$error['code']='1002';
						$error['msg']='请修改状态为已付款再更新物流信息';
						Helper::response($error);
					}
					$ret['modeinfo']=serialize($modeinfo);
				}
			}
			if(!empty($_POST['receivetime'])){
				//添加物流信息
				if($_POST['status'] != 3){
					$error['code']='1002';
					$error['msg']='请选择已完成再添加收货时间';
					Helper::response($error);
				}
			}else{
				unset($ret['receivetime']);
			}
			$orderid=$this->m_order->UpdateByID($ret,$_POST['id']);
			if($_POST['status']==4){
				$userinfo=$this->m_register->getUserById($orderinfo['uid']);
				$user['limits']=($userinfo['limits']-1);
				$this->m_register->UpdateByID($user,$orderinfo['uid']);
				
				$quantity['text']=($options['text']+$orderinfo['nums']);
				if($orderid && ($orderinfo['status'] < 1)){
					$this->m_setting->UpdateByID($quantity,$options['id']);
				}
			}
			
			/*if($_POST['status'] == 1){
				$options=$this->m_setting->getoptions('product');
				if($options['text'] > $orderinfo['nums']){
					//修改库存数量
					$quantity['text']=($options['text']-$orderinfo['nums']);
					if($orderid && ($orderinfo['status'] < 1)){
						$this->m_setting->UpdateByID($quantity,$options['id']);
					}
				}else{
					//库存数量不足
					$error['code']='1002';
					$error['msg']='库存数量不足';
					Helper::response($error);
				}
			}*/
			
			if(!empty($logistics)){
				//添加物流信息
				$logistics['oid']=$_POST['id'];
				$id=$this->m_logistics->Insert($logistics);
			}
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
	
	public function excelAction($ex='2007'){
		date_default_timezone_set('PRC');
		ini_set('date.timezone','Asia/Chongqing');
		set_time_limit(0);
		
		Yaf_Loader::import(APP_PATH.'/application/library/PHPExcel.php');
		
        $links_list=$this->m_order->excelorder();
		
		$objExcel = new PHPExcel();
		
		//$objExcel->setActiveSheetIndex(0);
		
		
		//表头
		$k1="编号";
		$k2="充值类型";
		$k3="订单号";
		$k4="购买数量";
		$k5="姓名";
		$k6="电话";
		$k7="收货地址";
		$k8="时间";
		$k9="充值地址";
		$k10="用户地址";
		$k11="交易哈希";
		$k12="交易状态";
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
		$objExcel->getActiveSheet()->setCellValue('k1', "$k11");
		$objExcel->getActiveSheet()->setCellValue('l1', "$k12");
		
		$msg=array('0'=>'交易中','1'=>'已付款','2'=>'配送中','3'=>'已完成');
		
		$i=0;
		foreach($links_list as $k=>$v) {
			$u1=$i+2;
			 /*----------写入内容-------------*/
			 
			$objExcel->getActiveSheet()->setCellValue('a'.$u1, $v["id"]);
			$objExcel->getActiveSheet()->setCellValue('b'.$u1, $v["bname"]);
			$objExcel->getActiveSheet()->setCellValue('c'.$u1, $v['order_id']);
			$objExcel->getActiveSheet()->setCellValue('d'.$u1, $v["nums"]);
			$objExcel->getActiveSheet()->setCellValue('e'.$u1, $v["username"]);
			$objExcel->getActiveSheet()->setCellValue('f'.$u1, $v['tel']);
			$objExcel->getActiveSheet()->setCellValue('g'.$u1, $v['country'].$v['address']);
			$objExcel->getActiveSheet()->setCellValue('h'.$u1, date('Y-m-d H:i:s',$v["c_time"]));
			$objExcel->getActiveSheet()->setCellValue('i'.$u1, $v['gathering']);
			$objExcel->getActiveSheet()->setCellValue('j'.$u1, $v['payment']);
			$objExcel->getActiveSheet()->setCellValue('k'.$u1, $v['pay_hash']);
			$objExcel->getActiveSheet()->setCellValue('l'.$u1, $msg[$v["status"]]);
			$i++;
		}
		
		
		// 高置列的宽度
		$objExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
		$objExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
		$objExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
		$objExcel->getActiveSheet()->getColumnDimension('D')->setWidth(50);
		$objExcel->getActiveSheet()->getColumnDimension('E')->setWidth(50);
		$objExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
		$objExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
		$objExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
		$objExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
		$objExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
		$objExcel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
		$objExcel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
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
