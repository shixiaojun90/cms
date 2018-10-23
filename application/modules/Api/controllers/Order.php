<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午10:42
 */
class OrderController extends BasicController {
    private function init(){
		$this->m_register=$this->load('Register');
		$this->m_order=$this->load('order');
		$this->m_logistics=$this->load('logistics');
		$this->m_currency=$this->load('currency');
		$this->m_setting=$this->load('setting');
		$this->m_aaclog=$this->load('aaclog');
        $this->zhcomment=include_once(LANG_PATH.'/zh/Comment.php');
		$this->encomment=include_once(LANG_PATH.'/en/Comment.php');
		$this->kacomment=include_once(LANG_PATH.'/ka/Comment.php');
		$this->basic=Yaf_Loader::import(FUNC_PATH.'/F_Basic.php');
		$this->network=Yaf_Loader::import(FUNC_PATH.'/F_Network.php');
        header('Access-Control-Allow-Origin: https://acuteangle.com');
        header('Access-Control-Allow-Methods: GET, POST');
		header('Access-Control-Allow-Credentials: true');
		session_start();
    }
	
	
	public function recordAction(){
		try{
			if($_POST['language_id']==1){
				$msg=$this->zhcomment;
			}elseif($_POST['language_id']==2){
				$msg=$this->encomment;
			}else{
				$msg=$this->kacomment;
			}
			$error['code']='1002';
			$error['msg']=$msg['error_stop'];
			Helper::response($error);
			$userinfo=$this->m_register->getUserById($_POST['uid']);
			$sort='id DESC';
			if(!empty($userinfo) && $userinfo['access_token']==$_POST['token'] && $userinfo['id']==$_POST['uid']){
				$options=$this->m_setting->getoptions('product');
				//库存数量
				//print_r($options);
				if(!empty($options) && (intval($options['text'])) < $_POST['nums']){
					$error['code']='1002';
					$error['msg']=$msg['error_quantity'];
					Helper::response($error);
				}
				
				if($userinfo['limits'] >=5){
					$data['code']='1002';
					$data['msg']=$msg['error_maxhave'];
					Helper::response($data);
				}
				$pay=$this->m_currency->getnums($_POST['bname']);
				$record=$this->m_order->getOrderListByPage('1','1',$sort,$_POST['searchPhrase'],'(uid='.$userinfo['id'].')');
				if(!empty($record)){
					//unset($record['data'][0]['price']);
					//unset($record['data'][0]['total']);
					$list=$record['data'][0];
					$list['bname']=$_POST['bname'];
					$list['price']=$_POST['price'];
					$list['total']=$_POST['price']*$_POST['nums'];
					$list['nums']=$_POST['nums'];
					$list['paytarget']=$pay['paytarget'];
					Helper::response('0',$list);
				}else{
					$list['bname']=$_POST['bname'];
					$list['price']=$_POST['price'];
					$list['total']=$_POST['price']*$_POST['nums'];
					$list['nums']=$_POST['nums'];
					$list['paytarget']=$pay['paytarget'];
					Helper::response('0',$list);
				}
				//Helper::response('1002','');
			}else{
				$data['code']='1002';
				$data['msg']=$msg['error_status'];
				Helper::response($data);
			}
		}catch (Exception $ex){
            Helper::response('1006',$ex);
        }
	}
	
	//用于测试
	public function recordtestAction(){
		try{
			if($_POST['language_id']==1){
				$msg=$this->zhcomment;
			}elseif($_POST['language_id']==2){
				$msg=$this->encomment;
			}else{
				$msg=$this->kacomment;
			}
			
			$userinfo=$this->m_register->getUserById($_POST['uid']);
			$sort='id DESC';
			if(!empty($userinfo) && $userinfo['access_token']==$_POST['token'] && $userinfo['id']==$_POST['uid']){
				$options=$this->m_setting->getoptions('product');
				//库存数量
				//print_r($options);
				if(!empty($options) && (intval($options['text'])) < $_POST['nums']){
					$error['code']='1002';
					$error['msg']=$msg['error_quantity'];
					Helper::response($error);
				}
				
				if($userinfo['limits'] >=5){
					$data['code']='1002';
					$data['msg']=$msg['error_maxhave'];
					Helper::response($data);
				}
				$pay=$this->m_currency->getnums($_POST['bname']);
				$record=$this->m_order->getOrderListByPage('1','1',$sort,$_POST['searchPhrase'],'(uid='.$userinfo['id'].')');
				if(!empty($record)){
					//unset($record['data'][0]['price']);
					//unset($record['data'][0]['total']);
					$list=$record['data'][0];
					$list['bname']=$_POST['bname'];
					$list['price']=$_POST['price'];
					$list['total']=$_POST['price']*$_POST['nums'];
					$list['nums']=$_POST['nums'];
					$list['paytarget']=$pay['paytarget'];
					Helper::response('0',$list);
				}else{
					$list['bname']=$_POST['bname'];
					$list['price']=$_POST['price'];
					$list['total']=$_POST['price']*$_POST['nums'];
					$list['nums']=$_POST['nums'];
					$list['paytarget']=$pay['paytarget'];
					Helper::response('0',$list);
				}
				//Helper::response('1002','');
			}else{
				$data['code']='1002';
				$data['msg']=$msg['error_status'];
				Helper::response($data);
			}
		}catch (Exception $ex){
            Helper::response('1006',$ex);
        }
	}
	
    
    public function addorderAction(){
		try{
			if($_POST['language_id']==1){
				$msg=$this->zhcomment;
			}elseif($_POST['language_id']==2){
				$msg=$this->encomment;
			}else{
				$msg=$this->kacomment;
			}
			$userinfo=$this->m_register->getUserById($_POST['uid']);
			
			if(!empty($userinfo) && $userinfo['access_token']==$_POST['token'] && $userinfo['id']==$_POST['uid']){
				if(empty($_POST['captcha'])){
					$error['code']='1002';
					$error['msg']=$msg['null_code'];
					Helper::response($error);
				}
				
				if(strtolower($_POST['captcha']) != strtolower($_SESSION['aacCaptcha'])){
					$error['code']='1002';
					$error['msg']=$msg['money_code'];
					Helper::response($error);
				}
				
				$currency=$this->m_currency->getnums($_POST['bname']);
				//查询数字货币信息
				if(empty($currency) || empty($currency['paytarget'])){
					$error['code']='1002';
					$error['msg']=$msg['error_pay'];
					Helper::response($error);
				}
				
				if($_POST['price'] < $currency['price']){
					$error['code']='1002';
					$error['msg']=$msg['error_price'];
					Helper::response($error);
				}
				
				$orderCount=$this->m_order->getCount($_POST['uid']);
				
				if($userinfo['limits'] >=5 || $orderCount[0]['count'] >= 5){
					$error['code']='1002';
					$error['msg']=$msg['error_maxhave'];
					Helper::response($error);
				}
				
				if(($userinfo['limits']+intval($_POST['nums'])) > 5){
					$error['code']='1002';
					$error['msg']=$msg['error_limits'].(5-$userinfo['limits']).$msg['product_nums'];
					Helper::response($error);
				}
				
				if(($orderCount[0]['count']+intval($_POST['nums'])) > 5){
					$error['code']='1002';
					$error['msg']=$msg['error_limits'].(5-$orderCount[0]['count']).$msg['product_nums'];
					Helper::response($error);
				}
				
				if(empty($_POST['bname'])){
					$error['code']='1002';
					$error['msg']=$msg['error_bname'];
					Helper::response($error);
				}
				
				if(empty($currency['paytarget'])){
					$error['code']='1002';
					$error['msg']=$msg['error_gathering'];
					Helper::response($error);
				}
				
				if(empty($_POST['nums']) || intval($_POST['nums']) <= 0){
					$error['code']='1002';
					$error['msg']=$msg['error_nums'];
					Helper::response($error);
				}
				
				if(intval($_POST['nums']) > 5){
					$error['code']='1002';
					$error['msg']=$msg['error_maxnums'];
					Helper::response($error);
				}
				
				if(!preg_match("/^\d*$/",$_POST['nums'])){
					$error['code']='1002';
					$error['msg']=$msg['error_numsint'];
					Helper::response($error);
				}
				
				if(empty($_POST['username'])){
					$error['code']='1002';
					$error['msg']=$msg['error_name'];
					Helper::response($error);
				}
				if(empty($_POST['tel'])){
					$error['code']='1002';
					$error['msg']=$msg['error_tel'];
					Helper::response($error);
				}
				
				/*if(empty($_POST['address'])){
					$error['code']='1002';
					$error['msg']=$msg['error_address'];
					Helper::response($error);
				}*/
				
				if(empty($_POST['pay_hash'])){
					$error['code']='1002';
					$error['msg']=$msg['error_payhash'];
					Helper::response($error);
				}
				
				if(empty($_POST['payment'])){
					$error['code']='1002';
					$error['msg']=$msg['error_payment'];
					Helper::response($error);
				}
				
				
				if(empty($_POST['country'])){
					$error['code']='1002';
					$error['msg']=$msg['error_country'];
					Helper::response($error);
				}
				
				$payhash=$this->m_order->payhash(trim($_POST['pay_hash']));
				
				//如果hash存在exit;
				if(!empty($payhash)){
					$error['code']='1002';
					$error['msg']=$msg['unique_payhash'];
					Helper::response($error);
				}
				
				if(!empty($_POST['address'])){
					$post['address']=stripHTML($_POST['address']);
				}
				
				$post['bname']=stripHTML($_POST['bname']);
				$post['uid']=stripHTML($_POST['uid']);
				$post['gathering']=stripHTML($_POST['gathering']);
				$post['nums']=stripHTML(intval($_POST['nums']));
				$post['price']=$currency['price'];
				$post['total']=($currency['price']*$post['nums']);
				$post['username']=stripHTML($_POST['username']);
				$post['tel']=stripHTML($_POST['tel']);
				//$post['address']=stripHTML($_POST['address']);
				$post['country']=stripHTML($_POST['country']);
				$post['pay_hash']=stripHTML($_POST['pay_hash']);
				$post['payment']=stripHTML($_POST['payment']);
				$post['c_time']=time();
				$post['ip']=getClientIP();
				$post['order_id']=oddnumbers();
				$post=quotes($post);
				//过滤单引号和特殊符号
				//$nbsp=array('"','`','‘’','“','\t','\n','\r','`',"'","\"\"",'\\','/','*');
				//打开事务
				$this->m_setting->beginTransaction();
				
				$options=$this->m_setting->getoptions('product');
				//库存数量
				
				if(!empty($options) && (intval($options['text'])) < $post['nums']){
					$error['code']='1002';
					$error['msg']=$msg['error_quantity'];
					Helper::response($error);
				}
				
				//减库存数量
				$quantity['text']=($options['text']-$post['nums']);
				$tingid=$this->m_setting->UpdateByID($quantity,$options['id']);
				
				
				$ret['limits']=($userinfo['limits']+$post['nums']);
				//limits记录用户购买次数=用户每次购买的数量
				$regid=$this->m_register->UpdateByID($ret,$_POST['uid']);
				
				
				$orderid=$this->m_order->Insert($post);
				//插入订单
				//$aaclog['order_id']=$orderid;
				//$aaclog['uid']=$post['uid'];
				//$aaclog['text']=$res;
				//$aaclog['c_time']=time();
				//$aacid=$this->m_aaclog->Insert($aaclog);
				
				if($orderid && $regid && $tingid){
					$this->m_setting->Commit();
					$data['code']='0';
					$data['msg']=$msg['order_success'];
					Helper::response($data);
				}else{
					$this->m_setting->Rollback();
					$error['code']='1002';
					$error['msg']=$msg['order_error'];
					Helper::response($error);
				}
			}else{
				$error['code']='1002';
				$error['msg']=$msg['error_status'];
				Helper::response($error);
			}
			
			
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
	
	
	public function getorderAction(){
		if($_POST['language_id']==1){
			$msg=$this->zhcomment;
		}elseif($_POST['language_id']==2){
			$msg=$this->encomment;
		}else{
			$msg=$this->kacomment;
		}
		
		$userinfo=$this->m_register->getUserById($_POST['uid']);
		if(!empty($userinfo) && $userinfo['access_token']==$_POST['token'] && $userinfo['id']==$_POST['uid']){
			//$orderinfo=$this->m_order->getOrder($userinfo['id']);
			
			$sort='id DESC';
			$orderinfo=$this->m_order->getOrderListByPage($_POST['rowCount'],$_POST['current'],$sort,$_POST['searchPhrase'],'(uid='.$userinfo['id'].')');
			
			if(!empty($orderinfo)){
				foreach($orderinfo['data'] as $key => $val){
					if(!empty($val['modeinfo'])){
						$modes=unserialize($val['modeinfo']);
						$orderinfo['data'][$key]['modes']=$modes['modes'];//配送方式
						$orderinfo['data'][$key]['freight']=$modes['freight'];//运费
						$orderinfo['data'][$key]['send_time']=$modes['send_time'];//发货时间
						$orderinfo['data'][$key]['lname']=$modes['lname'];//物流公司
						$orderinfo['data'][$key]['msorder']=$modes['msorder'];//快递单号
					}else{
						$orderinfo['data'][$key]['modes']="";//配送方式
						$orderinfo['data'][$key]['freight']="";//运费
						$orderinfo['data'][$key]['send_time']="";//发货时间
						$orderinfo['data'][$key]['pay_time']="";//发货时间
						$orderinfo['data'][$key]['lname']="";//物流公司
						$orderinfo['data'][$key]['msorder']="";//快递单号
					}
					unset($val['modeinfo']);
					$status=array('0'=>$msg['order_msg0'],'1'=>$msg['order_msg1'],'2'=>$msg['order_msg2'],'3'=>$msg['order_msg3'],'4'=>$msg['order_msg4']);
					//$status=array('0'=>0,'1'=>1,'2'=>2,'3'=>3,'4'=>4);
					$orderinfo['data'][$key]['msg']=$status[$val['status']];
					//if($key == 0){
					//	$orderinfo['data'][$key]['checked']=true;
					//}else{
						$orderinfo['data'][$key]['checked']=false;
					//}
					$orderinfo['data'][$key]['c_time']=date('Y-m-d H:i:s',$val['c_time']);//下单时间
					$orderinfo['data'][$key]['logistics']=$this->m_logistics->getLogisticsOid($val['id']);//物流跟踪信息
				}
			}
			
			if(!empty($orderinfo)){
				$data['code']='0';
				$data['data']=$orderinfo;
				Helper::response($data);
			}else{
				$data['code']='1002';
				$data['data']=array();
				Helper::response($data);
			}
		}else{
			$data['code']='10022';
			$data['msg']=$msg['error_status'];
			Helper::response($data);
		}

	}

    
}
