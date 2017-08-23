<?php

namespace Engine\Core\Auth;

use Engine\Helper\Cookie;

/**
 * Description of Auth
 *
 * @author ivc_shipul
 */
class Auth implements AuthInterface {

    /**
     *
     * @var bool $autorized 
     */
    protected $autorized = false;

    /**
     *
     * @var User $user 
     */
    protected $user;

    /**
     * @return bool autorized
     */
    public function autorized() {
        return $this->autorized;
    }

    /**
     * 
     * @return User $user
     */
    public function user() {
        return $this->user;
    }

    /**
     * 
     * @param User $user
     */
    public function autorize($user) {

        Cookie::set('auth_autorized', TRUE);
        Cookie::set('auth_user', $user);
        $this->autorized = true;
        $this->user = $user;
    }

    /**
     * 
     * @param User $user
     */
    public function unAutorize($user) {

        Cookie::delete('auth_autorized');
        Cookie::delete('auth_user');
        $this->autorized    = false;
        $this->user         = null;
    }
    
    /**
     * 
     * @return string salt
     */
    public static function salt() {
        return (string) rand(1000000, 99999999);
    }
    
    /**
     * 
     * @param type $password
     * @param type $salt
     * @return hash
     */
    public static function encriptPassword($password,$salt=''){
        return hash('sha256', $password,$salt);
    }

}
