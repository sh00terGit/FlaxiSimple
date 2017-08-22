<?php

namespace Engine\Core\Router;

/**
 * Description of UrlDispatcher
 *
 * @author ivc_shipul
 */
class UrlDispatcher {

    /**
     *
     * @var array $methods 
     */
    private $methods = array(
        'GET', 'POST'
    );

    /**
     *
     * @var array $routes
     */
    private $routes = array(
        'GET' => array(),
        'POST' => array()
    );

    /**
     *
     * @var array $patterns
     */
    private $patterns = array(
        'int' => '[0-9]+',
        'str' => '[a-zA-Z\.\-_%]+',
        'any' => '[a-zA-Z0-9\.\-_%]+',
    );

    /**
     * 
     * @param type $key
     * @param type $pattern
     */
    public function addPattern($key, $pattern) {
        $this->patterns[$key] = $pattern;
    }

    
    /**
     * 
     * @param type $method
     * @return type
     */
    public function routes($method) {
        return isset($this->routes[$method]) ? $this->routes[$method] : null;
    }

    
    /**
     * 
     * @param type $method
     * @param type $uri
     * @return \Engine\Core\Router\DispatchedRoute
     */
    public function dispatch($method, $uri) {
        $routes = $this->routes(strtoupper($method));
        if (array_key_exists($uri, $routes)) {
            return new DispatchedRoute($routes[$uri]);
        }
        return $this->doDispatch($method, $uri);
    }
    
    
    /**
     * 
     * @param type $method
     * @param type $uri
     * @return \Engine\Core\Router\DispatchedRoute
     */
    private function doDispatch($method, $uri){
          $routes = $this->routes(strtoupper($method));
          foreach ($routes as $route => $controller) {
             $pattern = "#^".$route."$#s"; 
             if (preg_match($pattern, $uri, $params)) {
                 return new DispatchedRoute($controller, $this->processParam($params));
             }
          }
        
    }
    
    
    /**
     * 
     * @param type $method
     * @param type $pattern
     * @param type $controller
     */
    public function register($method,$pattern,$controller) {
        $convert = $this->convertPattern($pattern);
         
        $this->routes[strtoupper($method)][$convert] = $controller;
    }
    
    
    /**
     * 
     * @param type $pattern
     * @return type
     */
    private function convertPattern($pattern) {
        if(strpos($pattern, "{") == FALSE)
            return $pattern;
        
        return preg_replace_callback("#\{(\w+):(\w+)\}#", array($this,'replacePattern'), $pattern);
    }
    
    
    /**
     * 
     * @param type $matches
     * @return type
     */
    private function replacePattern($matches){
        return "(?<".$matches[1] . ">". strtr($matches[2], $this->patterns).")";
    }
    
    
    /**
     * 
     * @param type $params
     * @return type $params
     */
    private function processParam($params) {
        foreach ($params as $key => $val) {
            if(is_int($key)) {
                unset($params[$key]);
            }
        }
        return $params;
    }
    

}
