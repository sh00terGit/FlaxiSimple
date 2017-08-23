<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Controller;
use Engine\Controller;
use Engine\Core\Auth\Auth;


/**
 * Description of LoginController
 *
 * @author ivc_shipul
 */
class LoginController extends Controller {
    
    /**
     *
     * @var Auth $auth 
     */
       protected $auth;

    
    
    
    public function __construct(\Engine\DI\DependentsInjection $container) {
        parent::__construct($container);
        $this->auth = new Auth();        
    }
    
    public function form() {
        var_dump($_COOKIE);
        $this->view->render('login');
    }
    
    public function authAdmin() {
        $params = $this->request->post;
        $this->auth->autorize('ttt');
        print_r($params);
    }
}
