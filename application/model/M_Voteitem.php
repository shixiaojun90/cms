<?php

class M_Voteitem extends Model {

    function __construct() {
        $this->table = TB_PREFIX.'vote_item';
        parent::__construct();
    }

    // 根据 VoteID 获取权限
    public function getVoteItemByID($Id){
        $field = array('id','vote_id','name','show_img','count','uid','c_time');
        return $this->SelectByID($field, $Id);
    }

    public function getVoteItemByVoteId($id){
        $field = array('id','vote_id','name','show_img','count','uid','c_time');
        return $this->Field($field)->Where(array('vote_id'=>$id))->Select();
    }

    /**获取所有用户
     * @return records
     */
    public function getVoteItemListByPage($pageSize=10,$current=1,$sort,$like){
        $field = array('id','vote_id','name','show_img','count','uid','c_time');
        return $this->Field($field)->tabPage($pageSize,$current,$sort,$like);
    }

    // 更新 VoteID 权限
    public function updateVoteItemByID($arr,$Id){
        return $this->UpdateByID($arr, $Id);
    }
}