<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 16/12/5
 * Time: 15:12
 */
class StaticPage{

    function __construct(){

    }

    public function staticPage($url=null,$exists=true){
        $controller=explode('/',$url)[0];
        $action='';
        $param='';
        $str=substr($url,strpos($url,'?')+1,strlen($url));
        if($this->checkStr(explode('/',$url)[1],'\?')==0){
            $action=explode('?',explode('/',$url)[1])[0];
            $param='_'.explode('=',$str)[1];
        }

        $action=$this->checkStr(explode('/',$url)[1],'\?')==0?explode('?',explode('/',$url)[1])[0]:explode('/',$url)[1];

        $filePath=$controller.'/'.$action.$param;

        if($exists) { //设置缓存失效时间
            $urlzz='http://'.$_SERVER['HTTP_HOST'].'/'.$url;

            if(strpos($urlzz,'?')){
                $urlzz.='&type=preview';
            }else{
                $urlzz.='?type=preview';
            }

            $html = file_get_contents($urlzz);

            $html =preg_replace('/"\.\.\/([a-z]+)\/([a-z]+)\?id=([0-9]+)"/', '"../$1/$2_$3.html"', $html);
            $html =preg_replace('/"\.\.\/([a-z]+)\/([a-z]+)"/', '"../$1/$2.html"', $html);
            $this->createDir('statics/'.$controller.'/');
            $fp = fopen('statics/'.$filePath.'.html',"w");

            if(!$fp)
            {
                echo "System Error";
                exit();
            }
            else
            {
                fwrite($fp,$html);
                fclose($fp);
                return true;
            }
        }
    }

    protected function checkStr($test,$str){
        $rule="/^((?!$str).)*$/is";
        return preg_match($rule,$test);
    }

    function createDir($folder){
        $reval = false;
        if(!file_exists($folder)){
            @umask(0);
            preg_match_all('/([^\/]*)\/?/i', $folder, $atmp);
            $base = ($atmp[0][0] == '/') ? '/' : '';

            foreach($atmp[1] AS $val) {
                if('' != $val){
                    $base .= $val;
                    if ('..' == $val || '.' == $val) {
                        $base .= '/';
                        continue;
                    }
                }else{
                    continue;
                }
                $base .= '/';
                if(!file_exists($base)){
                    if(@mkdir($base, 0777)){
                        @chmod($base, 0777);
                        $reval = true;
                    }
                }
            }
        }else{
            $reval = is_dir($folder);
        }

        clearstatcache();
        return $reval;
    }
}