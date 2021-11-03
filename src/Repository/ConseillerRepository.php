<?php

namespace App\Repository;

use App\Entity\Conseiller;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Conseiller|null find($id, $lockMode = null, $lockVersion = null)
 * @method Conseiller|null findOneBy(array $criteria, array $orderBy = null)
 * @method Conseiller[]    findAll()
 * @method Conseiller[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConseillerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Conseiller::class);
    }

    public function findBySomeField($value)
    {
        $query= $this->createQueryBuilder('c')
            ->andWhere('c.titre = :val')
            ->andWhere('c.ArreteAbrog IS  NULL')
            ->setParameter('val', $value)
            ->getQuery()
            
        ;
        return count($query->getResult()) ;
    }
    public function CountConseiller()
    {
        $query= $this->createQueryBuilder('c')
         
            ->andWhere('c.ArreteAbrog IS  NULL')
           
            ->getQuery()
            
        ;
        return count($query->getResult()) ;
    }
    public function CountConsAbrog()
    {
        $query= $this->createQueryBuilder('a')
          
            ->andWhere('a.ArreteAbrog IS NOT  NULL')         
            ->getQuery()
            
        ;
        return count($query->getResult()) ;
    }

    // /**
    //  * @return Conseiller[] Returns an array of Conseiller objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Conseiller
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
