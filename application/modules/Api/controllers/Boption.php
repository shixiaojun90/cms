<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午10:42
 */
class BoptionController extends BasicController {
    private function init(){
		$this->m_currency=$this->load('currency');
		$this->m_setting=$this->load('setting');
		$this->m_quantity=$this->load('quantity');
        header('Access-Control-Allow-Origin: https://acuteangle.com');
        header('Access-Control-Allow-Methods: GET, POST');
		header('Access-Control-Allow-Credentials: true');
    }
	
	
	
    
	
	public function getbnameAction(){
		$boption=$this->m_currency->getBname(0);
		foreach($boption as $key => $val){
			$boption[$key]['nums']=intval(1);
			$boption[$key]['allPrice']=$val['price'];
			if($key == 0){
				$boption[$key]['default']=true;
			}else{
				$boption[$key]['default']=false;
			}
		}
		
		if(!empty($boption)){
			$data['code']='0';
			$data['data']=$boption;
			Helper::response($data);
		}

	}

    public function getnumsAction(){
		$nums=$this->m_currency->getnums($_POST['name']);
		if(!empty($nums)){
			$data['code']='0';
			$data['data']=$nums;
			Helper::response($data);
		}
	}
	
}
