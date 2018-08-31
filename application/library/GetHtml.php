<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/3/24
 * Time: 下午5:20
 */
class GetHtml
{

    function __construct()
    {

    }

    public function get($url){
        //初始化
        $curl = curl_init();
        //设置抓取的url
        curl_setopt($curl, CURLOPT_URL, $url);
        //设置头文件的信息作为数据流输出
        curl_setopt($curl, CURLOPT_HEADER, 1);
        //设置获取的信息以文件流的形式返回，而不是直接输出。
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl,CURLOPT_CONNECTTIMEOUT,10);
        curl_setopt($curl, CURLOPT_USERAGENT, "User-Agent：Some-Agent / 1.0");
        //执行命令
        $data = curl_exec($curl);
        //关闭URL请求
        curl_close($curl);
        return $data;
    }
}