<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午10:42
 */
class updateorderController extends BasicController {
    private function init(){
		$this->m_register=$this->load('Register');
		$this->m_order=$this->load('order');
		$this->m_logistics=$this->load('logistics');
		$this->m_currency=$this->load('currency');
		$this->m_setting=$this->load('setting');
        $this->zhcomment=include_once(LANG_PATH.'/zh/Comment.php');
		$this->encomment=include_once(LANG_PATH.'/en/Comment.php');
		$this->kacomment=include_once(LANG_PATH.'/ka/Comment.php');
		$this->basic=Yaf_Loader::import(FUNC_PATH.'/F_Basic.php');
		$this->network=Yaf_Loader::import(FUNC_PATH.'/F_Network.php');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
    }
	
	public function indexAction(){
		try{
			$orderinfo=$this->m_order->excelorder();
			$str='';
			foreach($orderinfo as $key => $val){
				//echo $val['uid'];
				echo $str="update aa_order set order_id='".$val['order_id'].$val['uid']."' where id=".$val['id'].";"."<br>";
			}
			//echo $str;
			//print_r($orderinfo);exit;
		}catch (Exception $ex){
            Helper::response('1006',$ex);
        }
		
	}
	
	
    
}
