<?php

namespace Engine;
use Engine\DI\DependentsInjection;

class Load {

    const MASK_MODEL_ENTITY = '\%s\Model\%s\%s';
    const MASK_MODEL_REPOSITORY = '\%s\Model\%s\%sRepository';

    protected $repositories = array();
    protected $container ;




    public function __construct(DependentsInjection $container) {
        $this->container = $container;
    }

    /**
     * @param $modelName
     * @param bool $modelDir
     * @return \stdClass
     */
    public function getRepository($modelName, $modelDir = false) {

        
        
        $modelName = ucfirst($modelName);
        $modelDir = $modelDir ? $modelDir : $modelName;

      

        $namespaceRepository = sprintf(
                self::MASK_MODEL_REPOSITORY, ENV, $modelDir, $modelName
        );
        
        if (!isset($this->repositories[$name])) {
            $this->repositories[$name] = new $namespaceRepository($this->container);
        }
        return $this->repositories[$name];

    }
    
    public function createEntity($modelName,array $data=array(), $modelDir = false){
        
        $modelName = ucfirst($modelName);
        $modelDir = $modelDir ? $modelDir : $modelName;

        $namespaceEntity = sprintf(
                self::MASK_MODEL_ENTITY, ENV, $modelDir, $modelName
        );
        
        return new $namespaceEntity($data);
    }

}
