<?php

namespace Admin\Controller;
/**
 * Description of PageController
 *
 * @author ivc_shipul
 */
class PageController extends AdminController {
   
    
    public function listing() {
        $pageRepository = $this->load->getRepository('Page');
        $this->data['pages'] = $pageRepository->findAll();
        $this->view->render("pages/list", $this->data);
    }
    
    
    public function create() {
        $this->view->render("pages/save");
    } 
    
    public function add() {
        $params = $this->request->post;
        
        $pageRepository = $this->load->getRepository('Page');
        $page = $this->load->createEntity('Page',array('title' => $params['title'],'content' => $params['content'],'id' => $params['id']));
        $newPage = $pageRepository->save($page);       
        echo $newPage->id;
    }
    
    
    public function update($id) {
        $pageRepository = $this->load->getRepository('Page');
        $this->data['page'] = $pageRepository->find($id);
        $this->view->render("pages/save", $this->data);
    }
}
