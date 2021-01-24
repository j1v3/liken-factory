<?php

namespace App\Repository;

use App\Entity\SubSubMenu;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SubSubMenu|null find($id, $lockMode = null, $lockVersion = null)
 * @method SubSubMenu|null findOneBy(array $criteria, array $orderBy = null)
 * @method SubSubMenu[]    findAll()
 * @method SubSubMenu[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SubSubMenuRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SubSubMenu::class);
    }

    // /**
    //  * @return SubSubMenu[] Returns an array of SubSubMenu objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SubSubMenu
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
