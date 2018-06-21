<?php

namespace App\Repository;

use App\Entity\Educators;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Educators|null find($id, $lockMode = null, $lockVersion = null)
 * @method Educators|null findOneBy(array $criteria, array $orderBy = null)
 * @method Educators[]    findAll()
 * @method Educators[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EducatorsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Educators::class);
    }

//    /**
//     * @return Educators[] Returns an array of Educators objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Educators
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
