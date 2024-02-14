<?php

namespace App\Repository;

use App\Entity\CartaEdicion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CartaEdicion>
 *
 * @method CartaEdicion|null find($id, $lockMode = null, $lockVersion = null)
 * @method CartaEdicion|null findOneBy(array $criteria, array $orderBy = null)
 * @method CartaEdicion[]    findAll()
 * @method CartaEdicion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CartaEdicionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CartaEdicion::class);
    }

//    /**
//     * @return CartaEdicion[] Returns an array of CartaEdicion objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CartaEdicion
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
