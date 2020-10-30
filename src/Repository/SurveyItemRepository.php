<?php

namespace App\Repository;

use App\Entity\SurveyItem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SurveyItem|null find($id, $lockMode = null, $lockVersion = null)
 * @method SurveyItem|null findOneBy(array $criteria, array $orderBy = null)
 * @method SurveyItem[]    findAll()
 * @method SurveyItem[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SurveyItemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SurveyItem::class);
    }

    // /**
    //  * @return SurveyItem[] Returns an array of SurveyItem objects
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
    public function findOneBySomeField($value): ?SurveyItem
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
