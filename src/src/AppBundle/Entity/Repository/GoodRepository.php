<?php

namespace AppBundle\Entity\Repository;
use Doctrine\ORM\EntityRepository;

class GoodRepository extends EntityRepository
{
    public function findAllQuery()
    {
        return $this->_em->createQuery(
            "
            SELECT g
            FROM AppBundle:Good g
            "
        );
    }

    public function findGoodQuery($id)
    {
        $query = $this->_em->createQuery(
            "
            SELECT g
            FROM AppBundle:Good g
            WHERE g.id = :id
            "
        );
        $query->setParameter('id', $id);
        return $query;
    }

     public function deleteQuery($id)
     {
         $query = $this->_em->createQuery(
             "
             DELETE 
             FROM AppBundle:Good g
             WHERE g.id = :id
             "
         );
         $query->setParameter('id', $id);
         return $query;
     }
}
