<?php

namespace Admin\Model\Page;

use Engine\Model\Entity\EntityRepository;

/**
 * Description of UserMapper
 *
 * @author ivc_shipul
 */
class PageRepository extends EntityRepository {

    protected $table = 'page';
    protected $entityClass = 'Admin\\Model\\Page\\Page';

    
   
}
