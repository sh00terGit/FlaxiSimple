<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Engine\Service\Config;
use Engine\Service\AbstractProvider;
use Engine\Core\Config\Config;
/**
 * Description of Provider
 *
 * @author ivc_shipul
 */
class Provider extends AbstractProvider {
    //put your code here
    public $serviceName = 'config';


    public function init() {
        $config['main'] = Config::file('main');
        $config['database'] = Config::file('database');
        $this->container->set($this->serviceName,$config);
    }

}
