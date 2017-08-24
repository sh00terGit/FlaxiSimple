<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Controller;

/**
 * Description of DashboardController
 *
 * @author ivc_shipul
 */
class DashboardController extends AdminController {
    
    public function index() {
        $userRepository = $this->load->getRepository('User');
       // $user = $this->load->createEntity('User',array('email' => 'abcd@cms.local','login' => 'abc','password'=>'123','role'=>'admin','hash'=>'123'));
      //  $user = $userRepository->save($user);
//        var_dump($user);
        $this->view->render('dashboard');
        
    }
}

