<?php

namespace App\Repository;

use App\Entity\Assistant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Assistant|null find($id, $lockMode = null, $lockVersion = null)
 * @method Assistant|null findOneBy(array $criteria, array $orderBy = null)
 * @method Assistant[]    findAll()
 * @method Assistant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AssistantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Assistant::class);
    }

    // /**
    //  * @return Assistant[] Returns an array of Assistant objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    
    public function findBySomeField($value)
    {
        $query= $this->createQueryBuilder('a')
            ->andWhere('a.Titre = :val')
            ->andWhere('a.ArreteAbrog IS  NULL')
            ->setParameter('val', $value)
            
            ->getQuery()
            
        ;
        return count($query->getResult()) ;
    }
    public function CountAssitant()
    {
        $query= $this->createQueryBuilder('a')
          
            ->andWhere('a.ArreteAbrog IS  NULL')         
            ->getQuery()
            
        ;
        return count($query->getResult()) ;
    }
    public function CountAssAbrog()
    {
        $query= $this->createQueryBuilder('a')
          
            ->andWhere('a.ArreteAbrog IS NOT NULL')         
            ->getQuery()
            
        ;
        return count($query->getResult()) ;
    }
}
