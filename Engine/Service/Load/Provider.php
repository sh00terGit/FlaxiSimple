<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Engine\Service\Load;
use Engine\Service\AbstractProvider;
use Engine\Load;
/**
 * Description of Provider
 *
 * @author ivc_shipul
 */
class Provider extends AbstractProvider {
    //put your code here
    public $serviceName = 'load';


    public function init() {           
       
        $load = new Load();
        $this->container->set($this->serviceName,$load);
    }

}
