<?php

namespace Engine\Core\Request;

/**
 * Description of Request
 *
 * @author ivc_shipul
 */
class Request {
    
    public $get = array();
    
    public $post = array();
    
    public $request = array();    
    
    public $files = array();
    
    public $cookie = array();
    
    public $session = array();
    
    public $server = array();
    
    /**
     * Request init
     */
    public function __construct() {
        $this->get = $_GET;
        $this->post = $_POST;
        $this->request = $_REQUEST;
        $this->files = $_FILES;        
        $this->cookie = $_COOKIE;
        $this->session = $_SESSION;        
        $this->server = $_SERVER;      
        
    }
    
}
