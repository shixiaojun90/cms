<?php
/**
 * Created by PhpStorm.
 * User: 张亚宁
 * Date: 2018/1/3
 * Time: 11:15
 */
class M_Usd extends Model {
    function __construct() {
        $this->table = TB_PREFIX.'usd';
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
        $field = array('id','uid','bname','modeinfo','order_id''c_time','ip');

        return $this->Field($field)->tabPage($pageSize,$current,$sort,$like,$where);
    }

}
