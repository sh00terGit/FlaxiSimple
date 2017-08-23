<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Engine\Service\Request;
use Engine\Service\AbstractProvider;
use Engine\Core\Request\Request;
/**
 * Description of Provider
 *
 * @author ivc_shipul
 */
class Provider extends AbstractProvider {
    //put your code here
    public $serviceName = 'request';


    public function init() {   
        
        $request = new Request();
        
        $this->container->set($this->serviceName,$request);
    }

}
