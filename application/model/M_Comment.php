<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午9:48
 */
class M_Comment extends Model {
    function __construct() {
        $this->table = TB_PREFIX.'comment';
        parent::__construct();
    }

    public function getArtListByPage($pageSize=10,$current=1,$sort,$like,$where){
        $field = array('id','pid','content','abed_id','article_id','language_id','status','cuid','c_time');
        return $this->Field($field)->tabPage($pageSize,$current,$sort,$like,$where);
    }

    public function getAppuserByPage($pageSize=10,$current=1,$sort,$like,$where){
        $field = array('id','pid','content','c_time');
        return $this->Field($field)->tabPage($pageSize,$current,$sort,$like,$where);
    }
	

    public function getArticlebyId($id){
        $where=array('id'=>$id);
        return $this->where($where)->SelectOne();
    }
	

	
	public function getrefreshbylist($abed_id,$language_id,$page=0,$end=4){
		if($page < 1) $page=1;
		$start=($page-1)*$end;
        $sql="select c.id,u.username,c.pid,c.abed_id,c.content,c.article_id,c.language_id,c.cuid,c.c_time,u.username from aa_comment as c left join aa_register as u on u.id=c.cuid";
		$sql.=" where c.abed_id=".$abed_id." AND c.language_id=".$language_id;
		$sql.=" order by c.id desc Limit ".$start.",".$end;
		
        $data=$this->Query($sql);
		
		/******获取二层总条数*****/
		$contsql="select count(id) contpage from aa_comment";
		$contsql.=" where abed_id=".$abed_id." AND language_id=".$language_id;
		
		$contpage=$this->Query($contsql);
		
		return array("data"=>$data,"contpage"=>$contpage[0]['contpage']);
    }
	
	public function Totalnumbers($where){
		$contsql="select count(id) contpage from aa_comment";
		$contsql.=' where '.$where;
		$contpage=$this->Query($contsql);
		
		return array("total"=>$contpage[0]['contpage']);
    }
	
	/*********后台操作数据关联**********/
	public function getabedidlist($pid){
		$falg=0;
        $sql="select id,pid from aa_comment";
		$sql.=" where pid=".$pid;
        $data=$this->Query($sql);
		if(!empty($data)){
			foreach($data as $key => $val){
				if($val['pid']==$pid){
					$this->getabedidlist($val['id']);
					$falg=$this->Query($sql="delete from aa_comment where pid =".$pid);
					$this->Where(array('id'=>$pid))->Delete();
				}else{
					$falg=1;
					$this->Where(array('id'=>$pid))->Delete();
				}
			}
		}else{
			$falg=1;
		}
		
		return $falg;
    }
	
	
}