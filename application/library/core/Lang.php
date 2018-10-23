<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/9/20
 * Time: 下午4:25
 */
abstract class Lang {
    private $lang = array();

    public function __construct()
    {
        if (!defined('SYSTEM_LANG'))
        {
            return false;
        }

        if (SYSTEM_LANG == '')
        {
            return false;
        }

        $language_file = LANG_PATH . '/' . SYSTEM_LANG . '.php';

        if (file_exists($language_file))
        {
            require $language_file;
        }

        if (is_array($language))
        {
            $this->lang = $language;
        }
    }

    public static function translate($string, $replace = null, $display = false)
    {
        $search = '%s';

        if (is_array($replace))
        {
            $search = array();

            for ($i=0; $i<count($replace); $i++)
            {
                $search[] = '%s' . $i;
            };
        }

        if ($translate = lang[trim($string)])
        {
            if (isset($replace))
            {
                $translate = str_replace($search, $replace, $translate);
            }

            if (!$display)
            {
                return $translate;
            }

            echo $translate;
        }
        else
        {
            if (isset($replace))
            {
                $string = str_replace($search, $replace, $string);
            }

            return $string;
        }
    }

    public static function _t($string, $replace = null, $display = false)
    {
        return self::translate($string, $replace, $display);
    }
}