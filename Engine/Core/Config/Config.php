<?php


namespace Engine\Core\Config;

/**
 * Description of Config
 *
 * @author ivc_shipul
 */
class Config {
   
    
    public static function item($key,$group ='main') {
        
        $groupItems = static::file($group);
        return isset($groupItems[$key]) 
                    ? $groupItems[$key] 
                    : null;
    }
    
    public static function file($group) {
        $path = $_SERVER['DOCUMENT_ROOT']."/".strtolower(ENV).'/Config/'.$group.".php";
        if(file_exists($path)){
            $items = require_once $path;
            if(!empty($items)){
                return $items;
            } else {
                throw  new IsNotValidException(
                sprintf("Config file %s is not valid",$path)
                        );
                exit();
            }
            
        } else {
            throw new LoadingConfigException(
                    sprintf("Cannot load config from file %s",$path)
            );
        }
        
        return false;
    }
}
