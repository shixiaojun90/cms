<?php
/*
 *  WEB 的入口文件
 */

header('content-Type:text/html;charset=utf-8;');
define('APP_PATH',  realpath(dirname(__FILE__) . '/../'));


/*
 * 之所有要先包含 init.php 而不放在Bootstrap.php 里, 
 * 因为这样可以根据 ENV 来判断要不要抛出 YAF 本身的前置错误
 * 如配置出错了, 不包含 init.php 会一片空白, 包含了在 DEV 下则会抛出错误提示
 */
Yaf_Loader::import(APP_PATH.'/application/init.php');
$app = new Yaf_Application(APP_PATH.'/conf/application.ini');
// 以下设置为自定义错误处理, 但不要 NOTICE 错误
$app->getDispatcher()->throwException(FALSE)->setErrorHandler('yofErrorHandler', E_ALL ^E_NOTICE);
$app->bootstrap()->run();
