<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/9/14
 * Time: 下午5:44
 */
class DashboardController extends BasicController {

    private function init(){
        Yaf_Registry::get('adminPlugin')->checkLogin();
        Yaf_Registry::get('PermissionPlugin')->checkPermission(true);
		$this->m_walluser = $this->load('walluser');
    }

    public function indexAction(){
		//$this->getView()->assign(array('days'=>$this->m_downloads->Where("to_days(c_time) = to_days(now())")->Total()));//当天
		//$this->getView()->assign(array('weeks'=>$this->m_downloads->Where("YEARWEEK(c_time) = YEARWEEK(now())")->Total()));//本周
		//$this->getView()->assign(array('month'=>$this->m_downloads->Where("DATE_FORMAT( c_time, '%Y%m' ) = DATE_FORMAT( CURDATE( ) , '%Y%m' )")->Total()));//本月
		//$this->getView()->assign(array('year'=>$this->m_downloads->Total()));//总共
		
		//注册用户按照时间戳查询
		/* $this->getView()->assign(array('userdays'=>$this->m_walluser->Where("date_format(from_unixtime(c_time),'%Y-%m-%d') = date_format(now(),'%Y-%m-%d')")->Total()));//当天
		$this->getView()->assign(array('userweeks'=>$this->m_walluser->Where("YEARWEEK(from_unixtime(c_time),'%Y-%m-%d') = YEARWEEK(now(),'%Y-%m-%d')")->Total()));//本周
		$this->getView()->assign(array('usermonth'=>$this->m_walluser->Where("date_format(from_unixtime(c_time),'%Y-%m') = date_format(CURDATE(),'%Y-%m')")->Total()));//本月
		$this->getView()->assign(array('usercount'=>$this->m_walluser->Total()));//总共
		
		//$this->getView()->assign(array('country'=>$this->m_register->Group("country")->Limit("0,5")->Counts("count(id) as nums,country")));//总共
		
		//$area=$this->m_walluser->Group("country")->Counts("country,count(id) as nums");
		
		
		$this->getView()->assign(array('country'=>$area));//总共 */
    	
    }
	
	public function toIndexArrAction($arr){
		$i=0;
		foreach($arr as $key => $value){
			$newArr[$i] = $value;
			$i++;
		}
		return $newArr;
	}
}