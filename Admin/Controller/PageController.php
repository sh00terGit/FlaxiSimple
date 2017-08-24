<?php

namespace Admin\Controller;

/**
 * Description of PageController
 *
 * @author ivc_shipul
 */
class PageController extends AdminController {
    //put your code here
    
    public function listing() {
        $this->view->render("pages/list");
    }
}
