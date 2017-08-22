<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Engine\Service\Database;
use Engine\Service\AbstractProvider;
use Engine\Core\Database\Connection;
/**
 * Description of Provider
 *
 * @author ivc_shipul
 */
class Provider extends AbstractProvider {
    //put your code here
    public $serviceName = 'db';


    public function init() {   
        
        $config = $this->container->get('config');
        $db = new Connection(
                $config['database']['dbname'],
                $config['database']['user'],
                $config['database']['password'],
                $config['database']['host'],
                $config['database']['port'],
                $config['database']['charset']
        );
        
        $this->container->set($this->serviceName,$db);
    }

}
