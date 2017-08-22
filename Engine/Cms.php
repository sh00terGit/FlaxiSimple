<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Engine;

use Engine\Helper\Common;
use Engine\Core\Router\DispatchedRoute;

/**
 * Description of Cms
 *
 * @author ivc_shipul
 */
class Cms {

    /**
     *
     * @var $container 
     */
    private $container;
    private $router;

    //put your code here

    public function __construct($container) {
        $this->container = $container;
        $this->router = $container->get('router');
    }

    public function run() {
        try {
            require_once __DIR__."/../".mb_strtolower(ENV)."/Route.php";
            $routerDispatch = $this->router->dispatch(Common::getMethod(), Common::getPathUrl());
            if ($routerDispatch == null) {
                $routerDispatch = new DispatchedRoute('ErrorController::page404');
            }

            list($class, $action) = explode('::', $routerDispatch->getController(), 2);
            $controller = "\\".ENV."\\Controller\\" . $class;
            $params =  $routerDispatch->getParams();
            
            call_user_func_array(array(new $controller($this->container), $action),$params);
        } 
        catch (\ErrorException $exc) {
            
            echo $exc->getMessage();
            exit();
        }
    }

}
