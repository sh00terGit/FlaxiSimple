<?php

namespace Engine\Core\Config;

/**
 * Description of LoadingConfigException
 *
 * @author ivc_shipul
 */
class LoadingConfigException extends \Exception {

    
        // Переопределим строковое представление объекта.
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
    
    
}
