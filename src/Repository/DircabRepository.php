<?php

namespace App\Repository;

use App\Entity\Dircab;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Dircab|null find($id, $lockMode = null, $lockVersion = null)
 * @method Dircab|null findOneBy(array $criteria, array $orderBy = null)
 * @method Dircab[]    findAll()
 * @method Dircab[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DircabRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Dircab::class);
    }

    public function CountDircab()
    {
        $query= $this->createQueryBuilder('d')
         
            ->andWhere('d.Arrete_Abrog IS  NULL')
           
            ->getQuery()
            
        ;
        return count($query->getResult()) ;
    }
    public function CountDirAbrog()
    {
        $query= $this->createQueryBuilder('d')
          
            ->andWhere('d.Arrete_Abrog IS NOT NULL')         
            ->getQuery()
            
        ;
        return count($query->getResult()) ;
    }
    // /**
    //  * @return Dircab[] Returns an array of Dircab objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Dircab
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
