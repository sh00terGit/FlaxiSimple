<?php

namespace Engine;

class Load {

    const MASK_MODEL_ENTITY = '\%s\Model\%s\%s';
    const MASK_MODEL_REPOSITORY = '\%s\Model\%s\%sRepository';

    protected $repositories = array();

    /**
     * @param $modelName
     * @param bool $modelDir
     * @return \stdClass
     */
    public function getRepository($modelName, $modelDir = false) {

        global $container;
        
        $modelName = ucfirst($modelName);
        $modelDir = $modelDir ? $modelDir : $modelName;

      

        $namespaceRepository = sprintf(
                self::MASK_MODEL_REPOSITORY, ENV, $modelDir, $modelName
        );
        
        if (!isset($this->repositories[$name])) {
            $this->repositories[$name] = new $namespaceRepository($container);
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
