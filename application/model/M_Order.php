<?php

class M_Order extends Model {
    function __construct() {
        $this->table = TB_PREFIX.'order';
        parent::__construct();
    }

    /**
     * 获取订单分页列表
     * @param $pageSize 分页展示数据大小
     * @param $current 当前页码数
     * @param $sort 排序
     * @param $like 模糊查询
     * @param $where where条件
     */
//    public function getAppOrderListByPage($pageSize=10,$current=1,$sort,$like,$where){
//        $field = array('id','uid','bname','price','total','order_hash','address','status','product_id','gathering','payment','c_time','ip');
//        return $this->Field($field)->tabPage($pageSize,$current,$sort,$like,$where);
//    }


    public function getOrderListByPage($pageSize=10,$current=1,$sort,$like,$where){
        $field = array('id','uid','bname','price','total','nums','modeinfo','order_id','username','tel','address','pay_hash','status','product_id','gathering','payment','c_time','ip','receivetime','country');
        //$field = array('id','uid','bname','price','total','nums','modeinfo','order_id','username','tel','address','status','c_time','ip');

        return $this->Field($field)->tabPage($pageSize,$current,$sort,$like,$where);
    }

    /**
     * 根据id获取订单详情
     */
	public function getOrderAllInfo($uid){
		$sql = "select id,status,c_time,username,address,tel,bname,product_id,uid,pay_hash,order_id,modeinfo from aa_order where uid = ".$uid;
		$data=$this->Query($sql);
		return $data;
	}
	
	//从0到3的状态总共次数
	public function getCount($uid){
		$sql="select count(id) count from aa_order where uid=".$uid." AND status > 0";
		$data=$this->Query($sql);
		return $data;
	}
	
	public function getadminCount($uid){
		$sql="select count(id) count from aa_order where uid=".$uid." AND status > 0 AND status < 4";
		$data=$this->Query($sql);
		return $data;
	}
	
	public function saveorder($uid){
		$where=array('uid'=>$uid);
        return $this->where($where)->Select();
	}
	
	//查询交易hash
	public function payhash($payhash){
		$where=array('pay_hash'=>$payhash);
        return $this->where($where)->Select();
	}

    /**
     * 根据id获取一条订单信息
     */
    public function getOrderInfobyId($id){
        $where=array('id'=>$id);
        return $this->where($where)->SelectOne();
    }
	
	
	public function excelorder(){
		//$field = array('id','uid','bname','price','total','nums','modeinfo','order_id','username','tel','pay_hash','address','status','product_id','gathering','payment','c_time','ip','receivetime');
		//return $this->Field($field)->Select();
		
		$data=$this->Query($sql="select * from aa_order where bname!='USD'");
		//$data=$this->Query($sql="select id,uid,order_id from aa_order");
		return $data;
	}
	
	
}
