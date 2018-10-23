<?php

class TestController extends BasicController {

    public function init(){

    }

    public function testAction(){
        $arr=array('is_administortar'=>1,'publish_product'=>1,'edit_product'=>1,'delete_product'=>1);

        var_dump(serialize(array()));exit;
    }


    public function getbaiduAction(){
        $url='https://reg.jd.com/reg/person?ReturnUrl=https%3A//www.jd.com/';
        $html = $this->get_redirect_url($url);
        echo $html;exit;
    }
	
    public function test11Action()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        $data=$this->load('articleinfo')->getArticlebyId($_GET['id']);
        if($data){
            $content=base64_decode($data['content']);
        }
        $content=str_replace('http://ttt.3jiaoxing.com/upload','https://ttt.3jiaoxing.com/upload',$content);
        $data=$this->load('articleinfo')->UpdateByID(array('content'=>base64_encode($content)),$_GET['id']);
        echo $data;
        exit;
    }

    public function oauth_tokenAction(){
        echo sha1('oauth_token'+'hibige'+time());
    }


    public function test2Action()
    {
//        Yaf_Loader::import('library/AlidayuSMS.php');
        $alisend=new AlidayuSMS();
        $alisend->send('18600653688');
    }
    public function test3Action()
    {
//        echo sha1('bdavgk'.sha1('admin'));exit;
        $rsa=new Rsa();
        //私钥加密，公钥解密
        echo 'source：我是老鳖<br />';
        $pre = $rsa->privEncrypt('我是老鳖');
        echo 'private encrypted:<br />' . $pre . '<br />';

        $pud = $rsa->pubDecrypt($pre);
        echo 'public decrypted:' . $pud . '<br />';

//公钥加密，私钥解密
        echo 'source:干IT的<br />';
        $pue = $rsa->pubEncrypt('干IT的');
        echo 'public encrypt:<br />' . $pue . '<br />';

        $prd = $rsa->privDecrypt('WS8yC1z7z2fuIJYxgb2WQPZbpKC30och7/ai4AIEZmLqaao0actMxnmrjLrXXKI128od48H7CN8OTOClZGM3SEbuksI3WRYukjdpo7ei1O/SW65+LKz35rhQFh4LLH0fqjKDL6Q52xd4Z0yMnVpYi9qgauk8lM7u0KyGfN6eC04=');
        echo 'private decrypt:' . $prd;
    }

    public function test5Action(){
        var_dump(Validation::isEmail('1232@qq'));exit;
    }

    function GetIpLookup($ip = ''){
        if(empty($ip)){
            return '请输入IP地址';
        }
        $res = @file_get_contents('http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js&ip=' . $ip);
        if(empty($res)){ return false; }
        $jsonMatches = array();
        preg_match('#\{.+?\}#', $res, $jsonMatches);
        if(!isset($jsonMatches[0])){ return false; }
        $json = json_decode($jsonMatches[0], true);
        if(isset($json['ret']) && $json['ret'] == 1){
            $json['ip'] = $ip;
            unset($json['ret']);
        }else{
            return false;
        }
        return $json;
    }

    function get_redirect_url($url, $referer='', $timeout = 10) {
        $redirect_url = false;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, TRUE);
//        curl_setopt($ch, CURLOPT_NOBODY, TRUE);//不返回请求体内容
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);//允许请求的链接跳转
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          'Accept: */*',
          'User-Agent: Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)',
          'Connection: Keep-Alive'));
       if ($referer) {
         curl_setopt($ch, CURLOPT_REFERER, $referer);//设置referer
       }
        $content = curl_exec($ch);
        if(!curl_errno($ch)) {
            $redirect_url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);//获取最终请求的url地址
        }
        return $content;
    }
}
