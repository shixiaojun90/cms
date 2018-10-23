<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午10:42
 */
class CountryController extends BasicController {
    private function init(){
		$this->zhcomment=include_once(LANG_PATH.'/zh/Comment.php');
		$this->encomment=include_once(LANG_PATH.'/en/Comment.php');
		$this->kacomment=include_once(LANG_PATH.'/ka/Comment.php');
		$this->country=include(APP_PATH.'/public/Country.php');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
    }
	
	
	
	
    /**
     * 评论
     */
    public function getcountryAction(){
		try{
			if($_GET['language_id']==1){
				$msg=$this->zhcomment;
			}elseif($_GET['language_id']==2){
				$msg=$this->encomment;
			}else{
				$msg=$this->kacomment;
			}
			
			if(!empty($this->country)){
				array_unshift($this->country,$msg['country_xg'],$msg['china_xg'],$msg['china_tw'],$msg['china_aomen']);
				$country=array_unique($this->country);
				$list=array();
				foreach($country as $key => $val){
					$list[]=$val;
				}
				//$list=$this->country;
			}else{
				$list=array();
			}
			Helper::response('0',$list);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
    
}
