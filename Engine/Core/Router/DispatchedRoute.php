<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Engine\Core\Router;

/**
 * Description of DispatchedRoute
 *
 * @author ivc_shipul
 */
class DispatchedRoute {

    private $controller;
    private $params;
    
    
    /**
     * 
     * @param type $controller
     * @param type $params
     */
    public function __construct($controller,$params=array()) {
        $this->controller = $controller;
        $this->params = $params;
    }
    
    
    function getController() {
        return $this->controller;
    }

    
    /**
     * 
     * @return array
     */
    function getParams() {
        return $this->params;
    }


}
