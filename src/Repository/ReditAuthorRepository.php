<?php

namespace App\Repository;

use App\Entity\ReditAuthor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ReditAuthor|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReditAuthor|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReditAuthor[]    findAll()
 * @method ReditAuthor[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReditAuthorRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ReditAuthor::class);
    }

//    /**
//     * @return ReditAuthor[] Returns an array of ReditAuthor objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ReditAuthor
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
