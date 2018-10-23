<?php
abstract class Helper {

	private static $obj;

	/**
	 * Import function
	 *
	 * @param string file to be imported
	 * @return null
	 */
	public static function import($file) {
		$function = 'F_'.ucfirst($file);
		$f_file   = FUNC_PATH.'/'.$function.'.php';

		if(file_exists($f_file)){
			Yaf_Loader::import($f_file);
			unset($file, $function, $f_file);
		}else{
			$traceInfo = debug_backtrace();
			$error = 'Function '.$file.' NOT FOUND !';
			self::raiseError($traceInfo, $error);
		}
	}
	
	/**
	 * Load model
	 * <br />After loading a model, the new instance will be added into $obj immediately,
	 * <br />which is used to make sure that the same model is only loaded once per request !
	 *
	 * @param string => model to be loaded
	 * @return new instance of $model or raiseError on failure !
	 */
	public static function load($model) {
		$path = '';

		//分组功能
		if(strpos($model, '/') !== FALSE){
			list($category, $model) = explode('/', $model);
			$path = '/'. $category;
		}
		
		$hash = md5($path . $model);

		if(isset(self::$obj[$hash])) {
			return self::$obj[$hash];
		}

		$default = FALSE;
		$file = MODEL_PATH .$path .'/M_'.ucfirst($model).'.php';
		
		if(!file_exists($file)) {
			// 加载默认模型, 减少没啥通用方法的模型
			$default = TRUE;
			$table   = strtolower($model);
			$model   = 'M_Default';
			$file    = MODEL_PATH.'/'.$model.'.php';
		}

		if(PHP_OS == 'Linux'){
			Yaf_Loader::import($file);
		}else{
			require_once $file;
		}

		try{
			if($default){
				self::$obj[$hash] = new $model($table);
			}else{
				$model = 'M_'.$model;
				self::$obj[$hash] = new $model;	
			}
			
			unset($model, $default, $table, $file, $path, $category);
			return self::$obj[$hash];
		}catch(Exception $error) {
			$traceInfo = debug_backtrace();
			$error = 'Load model '.$model.' FAILED !';
			Helper::raiseError($traceInfo, $error);
		}
	}

	/**
     * Generate sign
     * @param array $parameters
     * @return new sign
     */
    public static function generateSign($parameters){
        $signPars = '';
        foreach($parameters as $k => $v) {
            if(isset($v) && 'sign' != $k) {
                $signPars .= $k . '=' . $v . '&';
            }
        }

        $signPars .= 'key='.API_KEY;
        return strtolower(md5($signPars));
    }
	
	
	/**
	 * Response
	 * 
	 * @param string $format : json, xml, jsonp, string
	 * @param array $data: 
	 * @param boolean $die: die if set to true, default is true
	 */
	private static function rs($data, $format = 'json', $die = TRUE) {
		switch($format){
			default:
			case 'json':
				$file = FUNC_PATH.'/F_String.php';
				Yaf_Loader::import($file);
				if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest"){ 
					$data = JSON($data);
				}else if(isset($_REQUEST['ajax'])){
					$data = JSON($data);
				}else{
					//pr($data); die; // URL 测试打印数组出来
					echo json_encode($data, JSON_UNESCAPED_UNICODE); die;
				}
			break;
			
			case 'jsonp':
				$data = $_GET['jsoncallback'] .'('. json_encode($data) .')';
			break;
			
			case 'string':
			break;
		}

		echo $data;
		
		if($die){
            die;
		}
	}

    public static function response($errorcode, $data = null) {
        if (is_array($errorcode)) {
            self::rs($errorcode);
        }
        $rep['code'] = $errorcode;
        switch ($errorcode) {
            //缺少参数
            case '1002':
                $rep['error'] = 'Misssing parameters';
                break;
            //没数据
            case '9998':
                $rep['error'] = 'No data';
                break;
            //未知错误
            case '9999':
                $rep['error'] = 'Unknown error';
                break;
            //操作重复
            case '1110':
                $rep['error'] = 'Operation duplicated';
                break;
            //上传到云错误
            case '1008':
                $rep['error'] = 'Failed to upload to cloud';
                break;
            //上传到tmp失败
            case '1007':

                $rep['error'] = 'Failed to upload to tmp';
                break;
            //收到文件为空
            case '1009':

                $rep['error'] = 'Empty file received';
                break;
            //没有权限
            case '10000':

                $rep['error'] = 'Permission denied';
                break;
            //返回成功
            case '0':
                $rep['msg'] = 'Success';
                $rep['data'] = $data;
                break;
            //异常返回
            case '1006':
                $rep['error'] = 'Try catch error';
                $rep['data'] = $data;
                break;
            //验证码错误
            case '1200':
                $rep['error'] = 'Verification code error';
                break;
            //帐号或者密码错误
            case '1201':
                $rep['error'] = 'Account or password failed';
                break;
            //此帐号被冻结，请联系管理员
            case '1202':
                $rep['error'] = 'This account is frozen, please contact the administrator';
                break;
			case '304':
                $rep['error'] = 'Please add the correct email address';
                break;
			case '201':
                $rep['error'] = 'Mail account already exists';
                break;
			case '400':
                $rep['error'] = 'Request Error';
                break;
        }
        self::rs($rep);
    }


	/**
	 * Raise error and halt if it is under DEV
	 *
	 * @param string debug back trace info
	 * @param string error to display
	 * @param string error SQL statement
	 * @return null
	 */
	public static function raiseError($trace, $error, $sql = '') {
		// YOF 自定义错误编号
		$errno   = 9999; 
		$errFile = $trace[0]['file'];
		$errLine = $trace[0]['line'];

		// Call yofErrorHandler to show error
		yofErrorHandler($errno, $error, $errFile, $errLine, $sql);
	}

	public static function getConfig($file){
		$f = APP_PATH.'/conf/'.$file;
		if(file_exists($f)){
			return include $f;
		}else{
			$traceInfo = debug_backtrace();
			$error = 'File '.$f.' NOT FOUND ';
			self::raiseError($traceInfo, $error);
		}
	}

}
