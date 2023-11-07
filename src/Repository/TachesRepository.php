<?php

namespace App\Repository;

use App\Entity\Taches;
use App\Entity\Projets;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Taches>
 *
 * @method Taches|null find($id, $lockMode = null, $lockVersion = null)
 * @method Taches|null findOneBy(array $criteria, array $orderBy = null)
 * @method Taches[]    findAll()
 * @method Taches[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TachesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Taches::class);
    }

//    /**
//     * @return Taches[] Returns an array of Taches objects
//     */
   public function findByProjet($value): array
   {
       return $this->createQueryBuilder('t')
            ->join('t.IdProjet', 'p')
            ->andWhere('p.id = :val')
           ->setParameter('val', $value)
           ->orderBy('t.id', 'DESC')
            // ->setMaxResults(10)
           ->getQuery()
           ->getResult()
       ;
   }

//    public function findOneBySomeField($value): ?Taches
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

    // public function findByProjet($value): array
    // {
    //     $entityManager = $this->getEntityManager();

    //     $query = $entityManager->createQuery(
    //         'SELECT t
    //         FROM App\Entity\Taches t
    //         INNER JOIN t.projets p
    //         WHERE p.id = :val
    //         ORDER BY t.id ASC'
    //     )->setParameter('val', $value);

    //     // returns an array of Product objects
    //     return $query->getResult();
    // }
}
