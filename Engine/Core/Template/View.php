<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Engine\Core\Template;

use Engine\Core\Template\Theme;

/**
 * Description of View
 *
 * @author ivc_shipul
 */
class View {

    protected $theme;

    
    /**
     * 
     */
    public function __construct() {
        $this->theme = new Theme();
    }

    /**
     * 
     * @param type $template
     * @param type $vars
     * @throws Exception
     * @throws \Exception
     */
    public function render($template, $vars = array()) {
        $templatePath = ROOT_DIR . "/Content/themes/default/" . $template . '.php';
        if (!is_file($templatePath)) {
            throw new \Exception(sprintf("Template %s not found in %s", $template, $templatePath));
        }
        
        $this->theme->setData($vars);
        extract($vars);
        ob_start();
        ob_implicit_flush(0);
        try {
            require $templatePath;
        } catch (\ErrorException $exc) {
            ob_end_clean();
            throw $exc;
        }
        echo ob_get_clean();
    }



}
