<?php

namespace Admin\Model\User;
use Engine\Model\Entity\Entity;

/**
 * Description of User
 *
 * @author ivc_shipul
 */
class User extends Entity {
   
    
    protected $id , $password , $email , $hash;
    
    
    function getId() {
        return $this->id;
    }

    function getPassword() {
        return $this->password;
    }

    function getEmail() {
        return $this->email;
    }

    function getHash() {
        return $this->hash;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setHash($hash) {
        $this->hash = $hash;
    }


}
