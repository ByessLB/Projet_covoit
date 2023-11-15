<?php

namespace App\Repository;

use App\Entity\Effectue;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Effectue>
 *
 * @method Effectue|null find($id, $lockMode = null, $lockVersion = null)
 * @method Effectue|null findOneBy(array $criteria, array $orderBy = null)
 * @method Effectue[]    findAll()
 * @method Effectue[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EffectueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Effectue::class);
    }

//    /**
//     * @return Effectue[] Returns an array of Effectue objects
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

//    public function findOneBySomeField($value): ?Effectue
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
