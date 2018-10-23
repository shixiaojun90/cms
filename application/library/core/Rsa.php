<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/9/18
 * Time: 下午4:57
 */
class Rsa {

    //私匙
    private $privKey = '-----BEGIN RSA PRIVATE KEY-----
MIICXAIBAAKBgQCeKO6lgAgQNBdETRG36H+Nzf/QyxmrbCCfT5nGR2rSnqW7Aw/4
/10CREDO7AznkAnPv+kh189nppXKNLdEg30GonelhUKVAPWRSdl9/vp6eXlpc6mH
juitfWplxTnSXPVdrJWTWV7QiB1RGZflOtRYw7x7HUAfhk++ofQT8r9r7QIDAQAB
AoGAA+XAU8W+7R9Lf3xitmR9WDI+XpfSrx3ABA0DHha+dChCr0QZDarFUPv7mN3K
R56OD1eMWDAoRUaepFf+OCsBVrGXsoO5+MNMPlxYbJLlcAdNgxS51/1SO3k+ii37
q2oW8TY9VqvE2eKYBhPOOr995DgyoW/aQAdCrBUSPKUbJoECQQDQzMcDETobcVpf
/RyQDaTKTtSgtgPG2uvEXEXPS9jqMxF9xjVv973iqrEZ/FRpTXopeE+sHmixR79s
Bxu7T4YhAkEAwemfq3zjfioS/voxq3nD+Mok4B6s+Axc1RwqVvbJxhStUrSXmACR
tDQ4/dC9FomcK85LEXBbIVLrb+QjRymUTQJAPU+kMHZihaRnUUBVnsci2HUFYpuP
yFiIWoRty00OSNbuD+yfzF0G2QQeNO8vKiyh7oNxgaz8OPJEd0gvEHVtgQJBAKe0
DCI8rWbEro8UBHb/pSv6by/hd8hCsNqiND/nyZNk+I0poF2WSGzoKU3iBFaEhqsg
C642VKoaU4H+dUArRpUCQDkAyYap3zCCk/yCKHSRK6bh8qPCD5o7ixwS4yREs5b5
qjs6dPAihy6iweZaW5Epu3TPT7kCkEy4xEinWpr+mDE=
-----END RSA PRIVATE KEY-----';

    //公匙
    private $pubKey = '-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCeKO6lgAgQNBdETRG36H+Nzf/Q
yxmrbCCfT5nGR2rSnqW7Aw/4/10CREDO7AznkAnPv+kh189nppXKNLdEg30Gonel
hUKVAPWRSdl9/vp6eXlpc6mHjuitfWplxTnSXPVdrJWTWV7QiB1RGZflOtRYw7x7
HUAfhk++ofQT8r9r7QIDAQAB
-----END PUBLIC KEY-----';

    /**
     * the construtor,the param $path is the keys saving path
     */
    public function __construct()
    {
    }

    /**
     * encrypt with the private key
     */
    public function privEncrypt($data)
    {
        if(!is_string($data)){
            return null;
        }

        $r = openssl_private_encrypt($data, $encrypted, $this->privKey);
        if($r){
            return base64_encode($encrypted);
        }
        return null;
    }

    /**
     * decrypt with the private key
     */
    public function privDecrypt($encrypted)
    {
        if(!is_string($encrypted)){
            return null;
        }

        $encrypted = base64_decode($encrypted);

        $r = openssl_private_decrypt($encrypted, $decrypted, $this->privKey);
        if($r){
            return $decrypted;
        }
        return null;
    }

    /**
     * encrypt with public key
     */
    public function pubEncrypt($data)
    {
        if(!is_string($data)){
            return null;
        }

        $r = openssl_public_encrypt($data, $encrypted, $this->pubKey);
        if($r){
            return base64_encode($encrypted);
        }
        return null;
    }

    /**
     * decrypt with the public key
     */
    public function pubDecrypt($crypted)
    {
        if(!is_string($crypted)){
            return null;
        }

        $crypted = base64_decode($crypted);

        $r = openssl_public_decrypt($crypted, $decrypted, $this->pubKey);
        if($r){
            return $decrypted;
        }
        return null;
    }

//    public function __destruct()
//    {
//        @fclose($this->privKey);
//        @fclose($this->pubKey);
//    }
}