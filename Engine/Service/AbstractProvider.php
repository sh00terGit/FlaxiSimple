<?php
namespace Engine\Service;
/**
 * Description of AbstractProvider
 *
 * @author ivc_shipul
 */
abstract class AbstractProvider {

    protected $container;
    /**
     * 
     * @param DI $di
     */
    public function __construct( \Engine\DI\DependentsInjection $di) {
        $this->container = $di;
    }
    
    /**
     * 
     */
    abstract public function init();
    
}

