<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/4/11
 * Time: 下午2:34
 */
include('alidayu/TopSdk.php');
Yaf_Loader::import("alidayu/top/TopClient.php");
Yaf_Loader::import("alidayu/top/request/AlibabaAliqinFcSmsNumSendRequest.php");

class AlidayuSMS{
    function __construct($username){
        session_id($username);
        session_start();
    }
    public function send($recNum='',$smsParam='',$smsTemplateCode='SMS_12360353', $smsFreeSignName='注册验证'){
        $c = new TopClient;
        $c->format = "json";
        $c->appkey = '23433262';
        $c->secretKey = '31b4c464ff59300ef543f1b827022e3b';
        $req = new AlibabaAliqinFcSmsNumSendRequest;
        //$req->setExtend("123456");
        $req->setSmsType("normal");
        $code=rand('100000','999999');//验证码
        $this->setSession($recNum,array('code'=>$code,'time'=>time()));
        $req->setSmsFreeSignName($smsFreeSignName);
        $req->setSmsParam($smsParam?$smsParam:"{\"code\":\"$code\",\"product\":\"Hi Bige\"}");
        $req->setRecNum($recNum);
        $req->setSmsTemplateCode($smsTemplateCode);
        $resp = $c->execute($req);
        if($resp->{'result'}->{'success'}){
            return array('code'=>0,'msg'=>'success');
        }else{
            return array('code'=>1,'msg'=>'faild');
        }
    }

    public function getCode($phone){
        $ret=$this->getSession($phone);
        if(time()>($ret['time']+600)){
            return array('code'=>500,'msg'=>'time out');
        }else{
            return array('code'=>200,'msg'=>'success','data'=>$ret['code']);
        }
    }

    private function getSession($key){
        return Yaf_Session::getInstance()->__get($key);
    }

    private function setSession($key, $val){
        return Yaf_Session::getInstance()->__set($key, $val);
    }
}