<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 下午2:37
 */
class HardwareController extends BasicController
{
    private function init()
    {
        $this->m_admin=$this->load('User');
        $this->m_hardware = $this->load('Hardware');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
    }

    public function tabPageAction(){
        try{
            //查询
            $data=$this->m_hardware->getHardWareListByPage($_GET['rowCount'],$_GET['current'],$_GET['sort'],$_GET['searchPhrase'],' status=2 ');
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
}