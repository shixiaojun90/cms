<?php

class BasicController extends Yaf_Controller_Abstract {
	protected $homeUrl;

	public function get($key, $filter = TRUE){
	    if($filter){
	      return filterStr($this->getRequest()->get($key));
	    }else{
	      return $this->getRequest()->get($key);
	    }
	}

  	public function getPost($key, $filter = TRUE){
	    if($filter){
	      return filterStr($this->getRequest()->getPost($key));
	    }else{
	      return $this->getRequest()->getPost($key);
	    }
	}

	public function getParam($key, $filter = TRUE){
	    if($this->getRequest()->isGet()){
	      if($filter){
	        return filterStr($this->getRequest()->get($key));
	      }else{
	        return $this->getRequest()->get($key);
	      }
	    }else{
	      if($filter){
	        return filterStr($this->getRequest()->getPost($key));
	      }else{
	        return $this->getRequest()->getPost($key);
	      }
	    }
	}

	public function getQuery($key, $filter = TRUE){
	    if($filter){
	      return filterStr($this->getRequest()->getQuery($key));
	    }else{
	      return $this->getRequest()->getQuery($key);
	    }
	}

	public function getSession($key){
	    return Yaf_Session::getInstance()->__get($key);
	}

	public function setSession($key, $val){
	    return Yaf_Session::getInstance()->__set($key, $val);
	}

	public function unsetSession($key){
	    return Yaf_Session::getInstance()->__unset($key);
	}

  // Clear cookie
	public function clearCookie($key){
	    setCookie($key, '');
	}

  /**
   * Set COOKIE
   */
	public function setCookie($key, $value, $expire = 3600, $path = '/', $domain = '', $httpOnly = FALSE){
	    setCookie($key, $value, CUR_TIMESTAMP + $expire, $path, $domain, $httpOnly);
	}

  /**
   * 获取cookie
   */
	public function getCookie($key){
	    return trim($_COOKIE[$key]);
	}

  // Go home
	public function goHome(){
	    jsRedirect($this->homeUrl);
	}

  // Show error
	public function showError($error, $tpl, $die = TRUE){
	    $buffer['error'] = $error;
	    $this->display($tpl, $buffer);
	
	    if($die){
	      die;
	    }
	}

  // Get limit
	public function getLimit($size = 10){
	    $page = $this->get('page');
	    if(!$page){
	      $page = $this->getPost('page');
	    }
	
	    $page = $page ? $page : 1;
	
	    $start = ($page-1)*$size;
	    $limit = $start.','.$size;
	
	    return $limit;
	}

  // Load model
	public function load($model){
	    return Helper::load($model);
	}

  /**
   * Verify API sign
   */
	public function verifySign(){
	    $sign = $this->getRequest()->getPost('sign');
	    $i['time'] = $this->getRequest()->getPost('time');
	
	    // Only valid in 30 seconds
	    if(CUR_TIMESTAMP - $i['time'] > 30){
	      $rep['code']  = 1001;
	      $rep['error'] = 'error sign';
	
	      Helper::response($rep);
	    }
	
	    $newSign = Helper::generateSign($i);
	
	    if(strtolower($newSign) != $sign){
	      $rep['code']  = 1001;
	      $rep['error'] = 'error sign';
	
	      Helper::response($rep);
	    }
	}
    /**
     * 发送post请求
     * @param string $url 请求地址
     * @param array $post_data post键值对数据
     * @return string
     */
    public function send_post($url, $post_data) {
        $postdata = http_build_query($post_data);
        $options = array(
            'http' => array(
                'method' => 'POST',
                'header' => 'Content-type:application/x-www-form-urlencoded',
                'content' => $postdata,
                'timeout' => 15 * 60 // 超时时间（单位:s）
            )
        );

        $context = stream_context_create($options);

        $result = file_get_contents($url, false, $context);
        return $result;
    }

    /**
     * 格式化输出相应的语言
     *
     * 根据语言包中数组键名的下标获取对应的翻译字符串
     *
     * @param  string
     * @param  string
     */
    function _e($string, $replace = null)
    {
        Lang::translate($string, $replace, TRUE);
    }
}

