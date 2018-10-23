<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/13
 * Time: 下午5:21
 */
class VoteController extends BasicController
{
    private function init()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        $this->m_vote  = $this->load('vote');
        $this->m_voteitem  = $this->load('voteitem');
        session_start();
    }

    public function GetVoteAction(){
        $vote=$this->m_vote->Select();
        foreach ($vote as $key=>$val){
            $vote[$key]['item']=$this->m_voteitem->getVoteItemByVoteId($val['id']);
        }
        Helper::response('0',$vote);
    }

    public function UpdateCountAction(){

        if(time()>$_SESSION['voteTime'.$_POST['id']]+60){
            $count=$this->m_voteitem->getVoteItemByID($_POST['id'])['count'];
            $data=$this->m_voteitem->updateVoteItemByID(array('count'=>$count+1),$_POST['id']);
            $this->setSession('voteTime'.$_POST['id'], time());
            Helper::response('0',$data);
        }else{
            Helper::response('1110');
        }
    }
}