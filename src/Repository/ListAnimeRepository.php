<?php

namespace App\Repository;

use App\Entity\ListAnime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ListAnime>
 *
 * @method ListAnime|null find($id, $lockMode = null, $lockVersion = null)
 * @method ListAnime|null findOneBy(array $criteria, array $orderBy = null)
 * @method ListAnime[]    findAll()
 * @method ListAnime[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ListAnimeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ListAnime::class);
    }

//    /**
//     * @return ListAnime[] Returns an array of ListAnime objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ListAnime
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
