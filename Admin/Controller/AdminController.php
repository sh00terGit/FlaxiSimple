<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Controller;
use Engine\Controller;
use Engine\Core\Auth\Auth;


class AdminController extends Controller  {   
    
    /**
     *
     * @var Auth $auth 
     */
       protected $auth;


       /**
        * 
        * @param DI $container
        */
       public function __construct($container) {
        parent::__construct($container);    
        $this->auth = new Auth();
        $this->checkAutorized();
        
        
    }
    
    /**
     * check autorized
     */
    public function checkAutorized() {
       if(!$this->auth->autorized()) {
            header("Location: /admin/login", true, 301);
        } 
    }
    
}
