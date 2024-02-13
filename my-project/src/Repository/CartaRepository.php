<?php

namespace App\Repository;

use App\Entity\Carta;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Carta>
 *
 * @method Carta|null find($id, $lockMode = null, $lockVersion = null)
 * @method Carta|null findOneBy(array $criteria, array $orderBy = null)
 * @method Carta[]    findAll()
 * @method Carta[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CartaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Carta::class);
    }

//    /**
//     * @return Carta[] Returns an array of Carta objects
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

//    public function findOneBySomeField($value): ?Carta
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
