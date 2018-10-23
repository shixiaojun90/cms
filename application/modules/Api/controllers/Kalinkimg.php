<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午10:42
 */
class KalinkimgController extends BasicController {
    private function init(){
        $this->m_linkimg = $this->load('kalinkimg');
        $this->m_admin=$this->load('User');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
    }

    /**
     * 分页获取新闻分类
     */
    public function tabPageAction(){
        try{
            //查询
			$sort='sort ASC';
            $data=$this->m_linkimg->getAppArtListByPage($_POST['rowCount'],$_POST['current'],$sort,$_POST['searchPhrase'],'');
			if(!empty($data)){
				$data=$data;
			}else{
				$data=array();
			}
            Helper::response('0',$data);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }

}
