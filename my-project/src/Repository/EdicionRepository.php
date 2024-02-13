<?php

namespace App\Repository;

use App\Entity\Edicion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Edicion>
 *
 * @method Edicion|null find($id, $lockMode = null, $lockVersion = null)
 * @method Edicion|null findOneBy(array $criteria, array $orderBy = null)
 * @method Edicion[]    findAll()
 * @method Edicion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EdicionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Edicion::class);
    }

//    /**
//     * @return Edicion[] Returns an array of Edicion objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Edicion
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
