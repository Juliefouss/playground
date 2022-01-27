<?php

namespace App\Repository;

use App\Entity\Area;
use App\Search\Search;
use App\Search\SearchUser\SearchUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Area|null find($id, $lockMode = null, $lockVersion = null)
 * @method Area|null findOneBy(array $criteria, array $orderBy = null)
 * @method Area[]    findAll()
 * @method Area[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AreaRepository extends ServiceEntityRepository
    /*Les Repository sont lié à une entité c'est ici qu'il faut noter les différentes fonctions pour les querybuilder, filtres*/

{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Area::class);

    }

/* Pour retrouver une aire de jeux via son id*/
    public function findById($id): Area
    {
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

    /* Pour faire les filtre pour la barre de recherche*/
    public function findBySearch(Search $search)
    {
        $qb = $this->createQueryBuilder('a')
            ->where('a.name LIKE :keyword')
            ->orWhere('a.ville LIKE :keyword')
            ->orWhere('a.decription LIKE :keyword')
            ->setParameter('keyword', '%' . $search->getKeyword() . '%');
        return $qb->getQuery()->getResult();
    }

    /* Pour faire les filtre pour le moteur de recherche */
    public function findBySearchUser(SearchUser $searchUser)
    {
        $qb = $this->createQueryBuilder('b')
            ->where('b.name LIKE :name')
            ->setParameter('name', '%' . $searchUser->getName() . '%');

        if ($searchUser->getVille()) {
            $qb->andWhere('b.ville = :ville')
                ->setParameter('ville', $searchUser->getVille());
        }
        if ($searchUser->getPostalcode()){
            $qb->andWhere('b.postalcode = :postalcode')
                ->setParameter('postalcode', $searchUser->getPostalcode());
        }

        if ($searchUser->getbaby()){
            $qb->andWhere('b.baby = :baby')
                ->setParameter('baby', $searchUser->getbaby());
        }

        if ($searchUser->getmini()){
            $qb->andWhere('b.mini = :mini')
                ->setParameter('mini', $searchUser->getmini());
        }
        if ($searchUser->getChild()){
            $qb->andWhere('b.child = :child')
                ->setParameter('child', $searchUser->getchild());
        }
        if ($searchUser->getJunior()){
            $qb->andWhere('b.junior = :junior')
                ->setParameter('junior', $searchUser->getJunior());
        }
        return $qb->getQuery()->getResult();

    }
}


