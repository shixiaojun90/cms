<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/3/21
 * Time: 下午4:37
 */
class ApiPlugin extends Yaf_Plugin_Abstract {
    //PHP stdClass Object转array
    function objectArray($object) {
        $obj = (array)$object;
        foreach ($obj as $k => $v) {
            if (gettype($v) == 'resource') {
                return;
            }
            if (gettype($v) == 'object' || gettype($v) == 'array') {
                $obj[$k] = (array)object_to_array($v);
            }
        }
        return $obj;
    }

}