<?php

namespace Engine\Core\Template;

/**
 * Description of Theme
 *
 * @author ivc_shipul
 */
class Theme {

    const HEADER_NAME   =   'header-%s';
    const FOOTER_NAME   =   'footer-%s';
    const SIDEBAR_NAME  =   'sidebar-%s';

    /* @var $url string */
    public $url = '';
    /* @var $data array */
    public $data = array();



    /**
     * 
     * @return array data
     */
    public function getData() {
        return $this->data;
    }

    /**
     * 
     * @param array $data
     */
    public function setData($data) {
        $this->data = $data;
    }

    /**
     * 
     * @param string $name
     */
    public function header($name = null) {
        $name = (string) $name;
        $file = 'header';
        if ($name != '') {
            $file = sprintf(self::HEADER_NAME, $name);
        }
        //VARS ARE NOT ALLOWED
        $this->loadTemplateFile($file);
    }

    
    /**
     * 
     * @param type $name
     */
    public function footer($name = '') {
         $name = (string) $name;
        $file = 'footer';
        if ($name != '') {
            $file = sprintf(self::FOOTER_NAME, $name);
        }
        //VARS ARE NOT ALLOWED
        $this->loadTemplateFile($file);
    }

    /**
     * 
     * @param type $name
     */
    public function sidebar($name = '') {
         $name = (string) $name;
        $file = 'sidebar';
        if ($name != '') {
            $file = sprintf(self::SIDEBAR_NAME, $name);
        }
        //VARS ARE NOT ALLOWED
        $this->loadTemplateFile($file);
    }

   /**
    * 
    * @param string $name
    * @param array $data
    */
    public function block($name = '',array $data = array()) {
         $file = (string) $name;
        if ($file != '') {
            $this->loadTemplateFile($file,$data);
        }
        
    }

    /**
     * 
     * @param type $nameFile
     * @param type $data
     * @throws Exception
     */
    private function loadTemplateFile($nameFile, $data = array()) {
        $templateFile = ROOT_DIR . '/Content/themes/default/' . $nameFile . '.php';
        if (is_file($templateFile)) {
            extract($data);
            require_once $templateFile;
            ;
        } else {
            throw new \Exception(sprintf('View file %s.php not found in %s', $nameFile, $templateFile));
        }
    }

}
