<?php

namespace App\Repository;

use App\Entity\Tienda;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Tienda>
 *
 * @method Tienda|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tienda|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tienda[]    findAll()
 * @method Tienda[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TiendaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tienda::class);
    }

//    /**
//     * @return Tienda[] Returns an array of Tienda objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Tienda
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
