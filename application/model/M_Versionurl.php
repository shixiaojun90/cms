<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午9:48
 */
class M_Versionurl extends Model {
    function __construct() {
        $this->table = TB_PREFIX.'version_url';
		$this->primary='id';
        parent::__construct();
    }
	
	public function getversionid($id){
        $where=array('vid'=>$id);
        return $this->where($where)->Selectone();
    }
	
	public function getversion($version){
        $where=array('version'=>$version);
        return $this->where($where)->Selectone();
    }
	
	public function getversionurl($url){
        $where=array('url'=>$url);
        return $this->where($where)->Selectone();
    }
    
    public function getnewversion(){
    	return $this->Selectone();
    }
}