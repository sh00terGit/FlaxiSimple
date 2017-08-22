<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Engine\Service\Router;
use Engine\Core\Router\Router;
use Engine\Service\AbstractProvider;

/**
 * Description of Provider
 *
 * @author ivc_shipul
 */
class Provider extends AbstractProvider {
    //put your code here
    public $serviceName = 'router';


    public function init() {
        $db = new Router("http://cms.local/");
        $this->container->set($this->serviceName,$db);
    }

}