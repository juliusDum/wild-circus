<?php

namespace App\Repository;

use App\Entity\Photogallery;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Photogallery|null find($id, $lockMode = null, $lockVersion = null)
 * @method Photogallery|null findOneBy(array $criteria, array $orderBy = null)
 * @method Photogallery[]    findAll()
 * @method Photogallery[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PhotogalleryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Photogallery::class);
    }

    // /**
    //  * @return Photogallery[] Returns an array of Photogallery objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Photogallery
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
