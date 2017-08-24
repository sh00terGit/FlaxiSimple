<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Controller;

use Engine\Controller;
use Engine\Core\Auth\Auth;
use Admin\Model\User\UserRepository;

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
        
        if($this->auth->hashUser() != null) {
            header("Location: /admin/",true,301);
        }
        
    }

    public function form() {
        $this->view->render('login');
    }

    public function authAdmin() {

        try {
            $params = $this->request->post;

            $userRepository = $this->load->getRepository('User');

            $user = $userRepository->autorizeFromDB($params['email'], $params['password']);

            if ($user->role == 'admin') {

                $user->hash = md5($user->id.$user->login . $user->password . $this->auth->salt());

                $userRepository->save($user);

                $this->auth->autorize($user->hash);
            }            
           
            
            //incorrect autorize
            header("Location: /admin/login");
            
        } catch (Exception $exc) {
            echo $exc->getMessage(sprintf("Autherization FAIL"));
        }
    }

}
