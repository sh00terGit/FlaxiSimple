<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Engine\Service\View;

use Engine\Service\AbstractProvider;
use Engine\Core\Template\View;

/**
 * Description of Provider
 *
 * @author ivc_shipul
 */
class Provider extends AbstractProvider {
    //put your code here
    public $serviceName = 'view';


    public function init() {
        $view = new View();
        $this->container->set($this->serviceName,$view);
    }
}

