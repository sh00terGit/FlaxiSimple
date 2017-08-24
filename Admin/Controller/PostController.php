<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Controller;

/**
 * Description of PostController
 *
 * @author ivc_shipul
 */
class PostController  extends AdminController{

 
    public function listing() {
        $postRepository = $this->load->getRepository('Post');
        $this->data['posts'] = $postRepository->findAll();
        $this->view->render("posts/list", $this->data);
    }
    
    
    public function create() {
        $this->view->render("posts/save");
    } 
    
    public function add() {
        $params = $this->request->post;
        
        $postRepository = $this->load->getRepository('Post');
        $post = $this->load->createEntity('Post',array('title' => $params['title'],'content' => $params['content'],'id' => $params['id']));
        $newPost = $postRepository->save($post);       
        echo $newPost->id;
    }
    
    
    public function update($id) {
        $postRepository = $this->load->getRepository('Post');
        $this->data['post'] = $postRepository->find($id);
        $this->view->render("posts/save", $this->data);
    }    
}
