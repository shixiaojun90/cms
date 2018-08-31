<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午10:42
 */
class VersionController extends BasicController {
    private function init(){
        $this->m_versionurl = $this->load('versionurl');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
    }

    
    public function getversionAction(){
        try{
            $data=$this->m_versionurl->Order("id desc")->getnewversion();
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
}
