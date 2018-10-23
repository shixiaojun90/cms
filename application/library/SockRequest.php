<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/4/11
 * Time: 上午10:13
 */
class SockRequest{

    //fsocket模拟get提交
    function sock_get($url, $query)
    {
        $query_str = http_build_query($query);

        $info = parse_url($url);
        $fp = fsockopen($info["host"], 80, $errno, $errstr, 3);
        //$head = "GET ".$info['path']."?".$info["query"]." HTTP/1.0\r\n";
        $head = "GET ".$info['path']."?".$query_str." HTTP/1.0\r\n";
        $head .= "Host: ".$info['host']."\r\n";
        $head .= "\r\n";
        $write = fputs($fp, $head);
        while (!feof($fp))
        {
            $line = fread($fp,4096);
            echo $line;
        }
    }

    function sock_post($url, $query)
    {
        $query_str = http_build_query($query);
        $info = parse_url($url);
        $fp = fsockopen($info["host"], 80, $errno, $errstr, 3);
        $head = "POST ".$info['path']."?".$info["query"]." HTTP/1.0\r\n";
        $head .= "Host: ".$info['host']."\r\n";
        $head .= "Referer: http://".$info['host'].$info['path']."\r\n";
        $head .= "Content-type:application/x-www-form-urlencoded;charset=utf-8\r\n";
        $head .= "Content-Length: ".strlen(trim($query_str))."\r\n";
        $head .= "\r\n";
        $head .= trim($query_str);
        $write = fputs($fp, $head);
        while (!feof($fp))
        {
            $line = fread($fp,4096);
            echo $line;
        }
    }

    function sock_wy_post($url,$header,$query)
    {
        $query_str = http_build_query($query);
        $info = parse_url($url);
        $fp = fsockopen($info["host"], 80, $errno, $errstr, 3);
        $head = "POST ".$url." HTTP/1.0\r\n";
        $head .= 'Host: '.$info['host']."\r\n";
        $head .= "Referer: https://".$info['host'].$info['path']."\r\n";
        $head .= "Content-type:application/x-www-form-urlencoded;charset=utf-8\r\n";
        $head .= 'Content-Length: '.strlen(trim($query_str))."\r\n";
        $head .= 'AppKey:'.$header['AppKey']."\r\n";
        $head .= 'Nonce:'.$header['Nonce']."\r\n";
        $head .= 'CurTime:'.$header['CurTime']."\r\n";
        $head .= 'CheckSum:'.$header['CheckSum']."\r\n";
        $head .= "\r\n";
        $head .= trim($query_str);

        $write = fputs($fp, $head);
        while (!feof($fp))
        {
            $line = fread($fp,4096);
            echo $line;
        }
    }

    function sock_ali_post($url,$query)
    {
        $query_str = http_build_query($query);
        $info = parse_url($url);
        $fp = fsockopen($info["host"], 80, $errno, $errstr, 3);
        $head = "POST http://gw.api.taobao.com/router/rest"." HTTP/1.0\r\n";
        $head .= 'Host: '.$info['host']."\r\n";
        $head .= "Referer: https://".$info['host'].$info['path']."\r\n";
        $head .= "Content-type:application/x-www-form-urlencoded;charset=utf-8\r\n";
        $head .= 'Content-Length: '.strlen(trim($query_str))."\r\n";
        $head .= 'app_key:23433262'."\r\n";
        $head .= 'method:alibaba.aliqin.fc.sms.num.send'."\r\n";
        $head .= 'format:json'."\r\n";
        $head .= 'partner_id:apidoc'."\r\n";
        $head .= 'sign:016C14351CCACBB58ACC7FFE1A81C1D6'."\r\n";
        $head .= 'sign_method:hmac'."\r\n";
        $head .= 'timestamp:'.time()."\r\n";
        $head .= 'v:2.0'."\r\n";
        $head .= 'extend:'.($query['uid']?$query['uid']:0)."\r\n";
        $head .= 'sms_type:normal'."\r\n";
        $head .= 'sms_free_sign_name:注册验证'."\r\n";
        $head .= 'rec_num:'.$query['mobile']."\r\n";
        $head .= 'sms_template_code:SMS_12360353'."\r\n";
        $head .= "\r\n";
        $head .= trim($query_str);
        var_dump($head);exit;
        $write = fputs($fp, $head);
        while (!feof($fp))
        {
            $line = fread($fp,4096);
            echo $line;
        }
    }
}