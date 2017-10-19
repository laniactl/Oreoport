<?php

class Session
{
    public static function inint(){
        if (!isset($_SESSION)) session_start();
    }
    public static function set($key, $value){

        $_SESSION[$key] = $value;
    }

    public static function get($key){
        if (isset($_SESSION[$key]))
        return $_SESSION[$key];
    }

    public static function destroy(){
        //todo .. unset session stuff
        //unset($_SESSION);

        session_destroy();
    }
}