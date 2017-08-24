<?php

namespace Admin\Model\User;

use Engine\Model\Entity\EntityRepository;

/**
 * Description of UserMapper
 *
 * @author ivc_shipul
 */
class UserRepository extends EntityRepository {

    protected $table = 'page';
    protected $entityClass = 'Admin\\Model\\Page\\Page';

    
   
}
