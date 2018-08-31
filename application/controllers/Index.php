<?php

class IndexController extends BasicController {

	public function init(){
//        Yaf_Registry::get('adminPlugin')->checkUser();
	}

	public function indexAction() {
		Yaf_Dispatcher::getInstance()->autoRender(false);
    }
}