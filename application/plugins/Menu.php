<?php

class MenuPlugin extends Yaf_Plugin_Abstract {

    public function loadmenu(){
    	$this->menu=$this->basic=require_once(MENU_PATH.'/menu.php');
    	//echo '/menu.php';
    	//print_r($this->menu);exit;
    }

}