<?php

declare(strict_types=1);

namespace MLD\SessionVisitsBundle\Repository;

use MLD\SessionVisitsBundle\Entity\Visits;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

use MLD\SessionVisitsBundle\DateSystem\Entity\Date;

/**
 * @extends ServiceEntityRepository<Visits>
 *
 * @method Visits|null find($id, $lockMode = null, $lockVersion = null)
 * @method Visits|null findOneBy(array $criteria, array $orderBy = null)
 * @method Visits[]    findAll()
 * @method Visits[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VisitsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Visits::class);
    }
    
    public function sumAllVisits(): int
    {
        return (int) $this->createQueryBuilder('v')
            ->select('SUM(v.visits)')
            ->getQuery()
            ->getSingleScalarResult()
        ;
    }

    public function sumYearVisits(Date $date): int|null
    {
        return (int) $this->createQueryBuilder('v')
            ->select('SUM(v.visits)')
            ->andWhere('v.year = :year')
            ->setParameter('year', $date->getYear())
            ->getQuery()
            ->getSingleScalarResult()
        ;
    }

    public function sumMonthVisits(Date $date): int|null
    {
        return $this->createQueryBuilder('v')
            ->select('SUM(v.visits)')
            ->andWhere('v.month = :month')
            ->setParameter('month', $date->getMonth())
            ->andWhere('v.year = :year')
            ->setParameter('year', $date->getYear())
            ->getQuery()
            ->getSingleScalarResult()
        ;
    }

    public function sumWeekVisits(Date $date): int|null
    {
        return (int) $this->createQueryBuilder('v')
            ->select('v.visits')
            ->andWhere('v.year = :year')
            ->setParameter('year', $date->getYear())
            ->andWhere('v.month = :month')
            ->setParameter('month', $date->getMonth())
            ->andWhere('v.week = :week')
            ->setParameter('week', $date->getWeek())
            ->getQuery()
            ->getSingleScalarResult()
        ;
    }

    public function findOneVisitsObjectByDate(Date $date): ?Visits
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.week = :week')
            ->setParameter('week', $date->getWeek())
            ->andWhere('v.month = :month')
            ->setParameter('month', $date->getMonth())
            ->andWhere('v.year = :year')
            ->setParameter('year', $date->getYear())
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    public function findAllByWeek(int $week): array
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.week = :week')
            ->setParameter('week', $week)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findAllVisits(): array
    {
        return $this->createQueryBuilder('v')
            ->getQuery()
            ->getResult()
        ;
    }

//    /**
//     * @return Visits[] Returns an array of Visits objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Visits
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
