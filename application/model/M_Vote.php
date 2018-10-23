<?php

class M_Vote extends Model {

    function __construct() {
        $this->table = TB_PREFIX.'vote';
        parent::__construct();
    }



    // 根据 VoteID 获取权限
    public function getVoteByID($Id){
        $field = array('id','uid','name','show_img','content','c_time');
        return $this->SelectByID($field, $Id);
    }

    /**获取所有用户
     * @return records
     */
    public function getVoteListByPage($pageSize=10,$current=1,$sort,$like){
        $field = array('id','uid','name','show_img','content','c_time');
        return $this->Field($field)->tabPage($pageSize,$current,$sort,$like);
    }

    // 更新 VoteID 权限
    public function updateVoteByID($arr,$Id){
        return $this->UpdateByID($arr, $Id);
    }
}