<?php

namespace App\Repository;

use App\Entity\Area;
use App\Search\Search;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Area|null find($id, $lockMode = null, $lockVersion = null)
 * @method Area|null findOneBy(array $criteria, array $orderBy = null)
 * @method Area[]    findAll()
 * @method Area[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AreaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Area::class);

    }


    public function findById($id): Area{
        $qb = $this->createQueryBuilder('a')
            ->where('a.id=:id')
            ->setParameter('id', $id);
        return $qb->getQuery()->getOneOrNullResult();
    }


    // /**
    //  * @return Area[] Returns an array of Area objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Area
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function findBySearch(Search $search)
    {
        $qb = $this->createQueryBuilder('a')
            ->where('a.name LIKE :keyword')
            ->orWhere('a.ville LIKE :keyword')
            ->setParameter('keyword','%'.$search->getKeyword().'%');
        return $qb->getQuery()->getResult();
    }


}

