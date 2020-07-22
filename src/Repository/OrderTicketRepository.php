<?php

namespace App\Repository;

use App\Entity\OrderTicket;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OrderTicket|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrderTicket|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrderTicket[]    findAll()
 * @method OrderTicket[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrderTicketRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OrderTicket::class);
    }

    // /**
    //  * @return OrderTicket[] Returns an array of OrderTicket objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OrderTicket
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
