<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Engine\Helper;

/**
 * Description of Common
 *
 * @author ivc_shipul
 */
class Common {
    //put your code here
    
    public function  isPost() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            return true;
        }
        return false;
    }
    
    public static function getMethod() {
        return $_SERVER['REQUEST_METHOD'];
    }
    
    public static function getPathUrl() {
        $pathUrl =  $_SERVER['REQUEST_URI'];
        if($position = strpos($pathUrl, '?')){
            $pathUrl = substr($pathUrl,0,$position);
        }
        return $pathUrl;
    }
   
}
