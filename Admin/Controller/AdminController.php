<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Controller;
use Engine\Controller;


class AdminController extends Controller  {   
    
       /**
     * 
     * @param type $container
     */
    public function __construct($container) {
        parent::__construct($container);       
    }
    
    public function index() {
        echo 'admin';
    }
}
