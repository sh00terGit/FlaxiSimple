<?php

namespace Engine\Model\Entity;
use IteratorAggregate;

/**
 * Description of Entity
 *
 * @author ivc_shipul
 */
abstract class Entity implements IteratorAggregate {

  protected $data;

  public function __construct(array $data = array() ) {
    $this->data = $data;
  }

  public function __set($property, $value) {
    $this->data[$property] = $value;
  }

  public function __get($property) {
    return isset($this->data[$property]) ? $this->data[$property] : null;
  }

  public function __isset($property) {
    return isset($this->data[$property]);
  }

  public function __unset($property) {
    unset($this->data[$property]);
  }

  public function getIterator() {
    $obj = new ArrayObject($this->data);
    return $obj->getIterator();
  }

  public function toArray() {
    return $this->data;
  }
}