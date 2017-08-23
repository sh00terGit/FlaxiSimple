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
    protected $view;
    protected $request;
    protected $config;

    /**
     * 
     * @param DependentsInjection $container
     */
    public function __construct(DependentsInjection $container) {
        $this->container = $container;
        $this->view = $this->container->get('view');
        $this->config = $this->container->get('config'); 
        $this->request = $this->container->get('request');
    }
    

}
