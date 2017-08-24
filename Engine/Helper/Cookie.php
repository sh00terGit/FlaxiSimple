<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Engine\Helper;

/**
 * Description of Cookie
 *
 * @author ivc_shipul
 */
class Cookie {

    /**
     * 
     * @param type $key
     * @param type $value
     * @param type $time
     */
    public static function set($key, $value, $time = '31536000') {
        setcookie($key, $value, time() + $time, '/');
    }

    /**
     * 
     * @param type $key
     * @return type
     */
    public static function get($key) {
        if (isset($_COOKIE[$key])) {
            return $_COOKIE[$key];
        }
        return null;
    }

    public static function delete($key) {
        if (isset($_COOKIE[$key])) {
            setcookie($key, NULL, time() + $time, '/');
        }
    }

}
