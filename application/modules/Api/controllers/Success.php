<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 下午2:29
 */
class SuccessController extends BasicController
{
    private function init()
    {
        $this->m_admin=$this->load('User');
        $this->m_Success = $this->load('Success');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
    }

    public function tabPageAction(){
        try{
            //查询
            $data=$this->m_Success->getSuccessListByPage($_GET['rowCount'],$_GET['current'],$_GET['sort'],$_GET['searchPhrase'],' status=2 ');
            foreach ($data['data'] as $key=>$val){
                $data['data'][$key]['creater']=$this->m_admin->getUserById($val['creater'])['login'];
                $data['data'][$key]['content']=base64_encode($data['data'][$key]['content']);
            }
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
}
