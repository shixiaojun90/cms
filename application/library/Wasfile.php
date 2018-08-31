<?php
/*
+--------------------------------------------------------------------------
|   WeCenter [#RELEASE_VERSION#]
|   ========================================
|   by WeCenter Software
|   © 2011 - 2014 WeCenter. All Rights Reserved
|   http://www.wecenter.com
|   ========================================
|   Support: WeCenter@qq.com
|
+---------------------------------------------------------------------------
*/
//namespace Wasfile\Wasfile;
class Wasfile
{
	
    public function getExtension($str)
    {
        $i = strrpos($str,".");
        if (!$i) { return ""; }

        $l = strlen($str) - $i;
        $ext = substr($str,$i+1,$l);
        return $ext;
    }

    public function uploadpic($version){
    	
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            $name = $_FILES['upload']['name'];
            $size = $_FILES['upload']['size'];
            $tmp = $_FILES['upload']['tmp_name'];
            $ext = $this->getExtension($name);
            $valid_formats = array("zip","rar");
            if(strlen($name) > 0)
            {
                if(in_array($ext,$valid_formats))
                {
                	//$maxsize=1024*1024;
                    //if($size<($maxsize))
                    //{
//                        include('s3_config.php');

                        // Bucket Name
                        $bucket="aacwallet";
                        
                        if (!class_exists('S3')) require_once('S3.php');
                        
                        //AWS access info
                        if (!defined('awsAccessKey')) define('awsAccessKey', 'AKIAJ7FSGGTYQCZBPBEQ');
                        if (!defined('awsSecretKey')) define('awsSecretKey', '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');
                        
                        //instantiate the class
                        $s3 = new S3(awsAccessKey, awsSecretKey);
                       	
                        $s3->putBucket($bucket, S3::ACL_PUBLIC_READ);

                        $actual_image_name = pathinfo($name)['filename'].'-'.$version.$ext;//文件名称加版本号
                        //time().".".$ext;
                        
                        if($s3->putObjectFile($tmp, $bucket , $actual_image_name, S3::ACL_PUBLIC_READ) )
                        {
                        	//echo "success";
                            $s3file['code']="success";
                            $s3file['url']='https://'.$bucket.'.s3.amazonaws.com/'.$actual_image_name;
							
                            //$callback = $_REQUEST['CKEditorFuncNum'];
                            //echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($callback,'".$s3file."','');</script>";

                        } else {
                        	//echo "fail";
                            $s3file['code']="fail";
                            $s3file['msg']="文件上传失败";
                            $s3file['url']='';
                        }
                    //} else {
                    //	$s3file['code']="fail";
                    //	$s3file['msg']="文件大小超出设定范围";
                    //	$s3file['url']='';
                    //}
                } else {
                	//echo "fail";
                	$s3file['code']="fail";
                	$s3file['msg']="文件格式有误";
                	$s3file['url']='';
                }
            } else {
            	//echo "error";
                $s3file['code']="error";
                $s3file['msg']="上传文件名称有误";
                $s3file['url']='';
            }
            
            return $s3file;
        }
    }


    public function uploadvideo(){
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            $name = $_FILES['upload']['name'];
            $size = $_FILES['upload']['size'];
            $tmp = $_FILES['upload']['tmp_name'];
            $ext = $this->getExtension($name);
//            $valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP");
            if(strlen($name) > 0)
            {
//                if(in_array($ext,$valid_formats))
//                {
//                    if($size<(1024*1024))
//                    {
                        $bucket="bchunk";
                        if (!class_exists('S3')) require_once('S3.php');

                        //AWS access info
                        if (!defined('awsAccessKey')) define('awsAccessKey', 'AKIAJ7FSGGTYQCZBPBEQ');
                        if (!defined('awsSecretKey')) define('awsSecretKey', '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');

                        //instantiate the class
                        $s3 = new S3(awsAccessKey, awsSecretKey);

                        $s3->putBucket($bucket, S3::ACL_PUBLIC_READ);

                        $actual_image_name = time().".".$ext;
                       
                        if($s3->putObjectFile($tmp, $bucket , $actual_image_name, S3::ACL_PUBLIC_READ) )
                        {
                            echo "S3 Upload Successful.";
                            $s3file='http://'.$bucket.'.s3.amazonaws.com/'.$actual_image_name;

                            $callback = $_REQUEST['CKEditorFuncNum'];
                            echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($callback,'".$s3file."','');</script>";

                        } else {
                            echo "S3 Upload Fail.";
                        }
//                    } else {
//                        echo "video size Max 1 MB";
//                    }
//                } else {
//                    echo "Invalid file, please upload video file.";
//                }
            } else {
                echo "Please select video file.";
            }
        }
    }


}
