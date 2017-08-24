<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Engine;

use Engine\DI\DependentsInjection;

/**
 * Description of Controller
 *
 * @author ivc_shipul
 */
abstract class Controller {

    /**
     *
     * @var DependentsInjection $container
     */
    protected $container;
//    protected $view;
//    protected $request;
//    protected $config;
//    protected $load;



    /**
     * 
     * @param DependentsInjection $container
     */
    public function __construct(DependentsInjection $container) {
        $this->container = $container;
//        $this->view = $this->container->get('view');
//        $this->config = $this->container->get('config'); 
//        $this->request = $this->container->get('request');
//        $this->db = $this->container->get('db');
//        $this->load = $this->container->get('load');
        $this->initVars();
    }
    
    
    public function __get($key) {
        return $this->container->get($key);
    }
    
    public function initVars() {
        $vars = array_keys(get_object_vars($this));
        foreach ($vars as $var) {
            if($this->container->has($var)) {
                $this->{$var} = $this->container->get($var);
            }
        }
        return $this;
    }
    

}
