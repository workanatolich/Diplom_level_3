<?php

namespace App\Configs;

class Mail {
    private static $host = 'smtp.mailtrap.io';
    private static $port = 2525;
    private static $username;
    private static $password;

    public static function get($param) {
        if($param == 'host') {
            return self::$host;            
        }

        if($param == 'port') {
            return self::$port;            
        }

        if($param == 'username') {
            return self::$username;            
        }

        if($param == 'password') {
            return self::$password;            
        }
    }
}

