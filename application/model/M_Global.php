<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 16/11/10
 * Time: 14:13
 */
class M_Global extends Model
{
    function __construct()
    {
        $this->table = TB_PREFIX . 'global';
        parent::__construct();
    }

    /**获取全局变量
     * @return records
     */
    public function getGlobal(){
        return $this->SelectOne();
    }
}