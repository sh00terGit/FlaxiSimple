<?php

namespace Admin\Model\User;

use Engine\Model\Entity\EntityRepository;

/**
 * Description of UserMapper
 *
 * @author ivc_shipul
 */
class UserRepository extends EntityRepository {

    protected $table = 'user';
    protected $entityClass = 'Admin\\Model\\User\\User';

    
    
        /**
     * конструктор запроса в бд 
     * @param array $conditions - условия
     * @param array $columns    - нужные столбцы
     * @param array $sort       - сортировка 
     * @param type $limit       - лимит
     * @param type $offset      -оффсет
     * @return type
     */
    public function autorizeFromDB($email ,$password ,array $columns = array(), array $sort = array(), $limit = 0, $offset = 0) {
       
        
        $row = $this->db->select(
                $this->table,  
                array(  'email' => $email,'password' => $password),
                array(),
                array(),
                1,
                0               )
                ->fetch();
        
        return $row ? $this->createEntity($row) : null;
    }
}
