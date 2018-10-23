<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/4/11
 * Time: 上午10:21
 */
class SMS{

    private $AppKey;
    private $AppSecret;
    private $Nonce;

    function __construct($AppKey=null,$AppSecret=null,$Nonce=null,$CurTime=null){

        if($AppKey&&$AppSecret&&$Nonce&&$CurTime){
            $this->AppKey=$AppKey;
            $this->AppSecret=$AppSecret;
            $this->Nonce=$Nonce;
            $this->CurTime=CurTime;
        }else{
            $this->AppKey='0b716f6abf48f3e70d46baf6404f22c9';
            $this->AppSecret='f1924310b5ff';
            $this->Nonce=md5(time());
            $this->CurTime=time();
        }
    }

    function getCheckSum(){
        return sha1($this->AppSecret.$this->Nonce.$this->CurTime);
    }

    function checkSumBuilder(){
        return array('AppKey'=>$this->AppKey,'Nonce'=>$this->Nonce,'CurTime'=>$this->CurTime,'CheckSum'=>$this->getCheckSum());
    }
}