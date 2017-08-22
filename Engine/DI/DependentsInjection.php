<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Engine\DI;

/**
 * Description of DependentInjection
 *
 * @author ivc_shipul
 */
class DependentsInjection {
    /**
     * Хранит все зависимости
     * @var $container  
     */
     private $containter = array();
    
    /**
     * 
     * @param type $key
     * @param type $value
     * @return $this
     */
    public function set($key,$value) {
        $this->containter[$key] = $value;
        return $this;
    }
    
    /**
     * 
     * @param type $key
     * @return type
     */
    public function get($key) {
        return $this->has($key);
    }
    
    
    /**
     * 
     * @param type $key
     * @return type
     */
    public function has($key) {
        return isset($this->containter[$key]) 
        ? $this->containter[$key]
        : null ;
    }
    
}
