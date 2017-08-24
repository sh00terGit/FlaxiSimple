<?php

namespace Admin\Model\Post;

use Engine\Model\Entity\EntityRepository;

/**
 * Description of UserMapper
 *
 * @author ivc_shipul
 */
class PostRepository extends EntityRepository {

    protected $table = 'Post';
    protected $entityClass = 'Admin\\Model\\Post\\Post';

    
   
}
