<?php 

class Session{

    public static function put($name, $value){
        $_SESSION[$name] = $value;
    }

    public static function get($name){
        // Check if the session key exists
        if (isset($_SESSION[$name])) {
            return $_SESSION[$name];
        }
        return null; // Return null if the key does not exist
    }

    public static function exists($name){
        // Check if the session key exists
        return isset($_SESSION[$name]);
    }

    public static function unset($name){
        // Unset the session key if it exists
        if (isset($_SESSION[$name])) {
            unset($_SESSION[$name]);
        }
        return true;
    }
}
