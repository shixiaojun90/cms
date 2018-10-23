<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/9/20
 * Time: 上午9:52
 */
/**
 * 生成密码种子
 *
 * @param  integer
 * @return string
 */
function fetch_salt($length = 4)
{
    for ($i = 0; $i < $length; $i++)
    {
        $salt .= chr(rand(97, 122));
    }
    return $salt;
}


/**
 * 根据 salt 混淆密码
 *
 * @param  string
 * @param  string
 * @return string
 */
function compile_password($password, $salt)
{
    $password = sha1($salt.sha1($password));
    return $password;
}