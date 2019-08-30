<?php
include_once "vendor/firebase/php-jwt/src/JWT.php";
use Firebase\JWT\JWT;

class Auth
{
    private static $secret_key = '%#CleanApp#%';
    private static $encrypt = ['HS256'];
    private static $aud = null;
    public static $days = 0;

    public static function SignIn($data)
    {
        $time = time();
        
        $token = array(
            'exp' => $time + (86400 * self::$days),
            'aud' => self::Aud(),
            'data' => $data
        );

        return JWT::encode($token, self::$secret_key);
    }
    
    public static function Check($token, &$err = "")
    {
        if(empty($token))
        {
            //throw new Exception("Invalid token supplied.");
            $err = "Invalid token supplied.";
            return false;
        }
        
        $decode = JWT::decode(
            $token,
            self::$secret_key,
            self::$encrypt
        );
        
        if($decode->aud !== self::Aud())
        {
            //throw new Exception("Invalid user logged in.");
            $err = "Invalid user logged in.";
            return false;
        }
        return true;
    }
    
    public static function GetData($token){
        return JWT::decode(
            $token,
            self::$secret_key,
            self::$encrypt
        )->data;
    }
    
    private static function Aud()
    {
        $aud = '';
        
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $aud = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $aud = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $aud = $_SERVER['REMOTE_ADDR'];
        }
        
        $aud .= @$_SERVER['HTTP_USER_AGENT'];
        $aud .= gethostname();
        
        return sha1($aud);
    }
}