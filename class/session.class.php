<?php

class Session{
    public static function sessionStart(){
        session_start();
    }
    public static function set($key,$value){
        $_SESSION[$key]=$value;
    }
    public static function isset($key){
        if(isset($_SESSION[$key])){
            return true;
        }else{
            return false;
        }
    }
    public static function get($key){
        if(Session::isset(key: $key)){
            return $_SESSION[$key];
        }else{
            return false;
        }
    }
    public static function destroy(){
        session_destroy();
    }
    public static function unset($key){
        unset($_SESSION[$key]);
    }
}