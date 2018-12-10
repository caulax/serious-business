<?php

namespace AppBundle\Entity\Repository;
use Doctrine\ORM\EntityRepository;

class OrderRepository extends EntityRepository
{


    public function deleteQuery($id)
    {
        $query = $this->_em->createQuery(
            "
             DELETE 
             FROM AppBundle:Order g
             WHERE g.id = :id
             "
        );
        $query->setParameter('id', $id);
        return $query;
    }

}
