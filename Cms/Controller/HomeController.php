<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Cms\Controller;
use Engine\Controller;

/**
 * Description of HomeController
 *
 * @author ivc_shipul
 */
class HomeController extends CmsController{

 
    public function index() {
        $this->view->render('index',array('name' => 'Andrey'));
        
    }
    public function news($id) {
        echo $id;
    }
    
}
