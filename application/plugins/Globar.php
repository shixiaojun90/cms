<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/3/21
 * Time: 下午4:37
 */
class GlobarPlugin extends Yaf_Plugin_Abstract {
    //获取数组的指定元素
    function getArray_key($array,$keys) {
        if(!is_array($array)) return;
        $arr=array();
        
        foreach ($array as $key => $val) {
        	$arr[$val['name']]=$val;
        }
        return $arr;
    }
	
}