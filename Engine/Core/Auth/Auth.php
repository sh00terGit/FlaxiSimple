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
    protected $hash_user;

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
    public function hashUser() {
        return Cookie::get('auth_user');
    }

    /**
     * 
     * @param hash user->hash
     */
    public function autorize($hash_user) {

        Cookie::set('auth_autorized', TRUE);
        Cookie::set('auth_user', $hash_user);
    }

    /**
     * 
     * 
     */
    public function unAutorize() {

        Cookie::delete('auth_autorized');
        Cookie::delete('auth_user');
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
