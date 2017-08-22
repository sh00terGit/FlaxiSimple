<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Engine\Core\Router;

/**
 * Description of Router
 *
 * @author ivc_shipul
 */
class Router {
    
    
    private $routes = array();
    private $host;
    private $dispatcher;




    public function __construct($host) {
        $this->host = $host;
    }
    
    /**
     * 
     * @param type $key
     * @param type $pattern
     * @param type $controller
     * @param type $method
     */
    public function add($key,$pattern,$controller,$method ='GET'){
        $this->routes[$key] = array(
            'pattern'       => $pattern,
            'controller'    => $controller,
            'method'        => $method
        );
    }
    
    
    /**
     * 
     * @param type $method
     * @param type $uri
     */
    public function dispatch($method, $uri) {
        return $this->getDispatcher()->dispatch($method, $uri);
    }
    
    /**
     * 
     * @return dispatcher
     */
    public function getDispatcher() {
        
        if($this->dispatcher == null) {
            $this->dispatcher = new UrlDispatcher();
            foreach ($this->routes as $route) {
                $this->dispatcher->register($route['method'],$route['pattern'],$route['controller']);
            }
        }
        
        return $this->dispatcher;
    }
    
 
}
