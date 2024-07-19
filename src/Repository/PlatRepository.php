<?php

namespace App\Repository;

use App\Entity\Plat;
use App\Entity\Detail;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\QueryBuilder;

/**
 * @extends ServiceEntityRepository<Plat>
 */
class PlatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Plat::class);
    }

    // public function findByCategorie($id) : array
    // {
    //     return $this->createQueryBuilder('p')
    //     ->where('p.categorie = :id')
    //     ->setParameter('id', $id)
    //     ->addOrderBy('p.id', 'ASC')
    //     ->getQuery()
    //     ->getResult()
    //     ;
    // }

    
 
        
         
        
    
        public function findByVentes(): array
        {
            return $this->createQueryBuilder('p')
                ->select("SUM(d.quantite) as quant, p as plat")
                ->innerJoin('p.detail', 'd')
                ->groupBy("p.libelle")
                ->orderBy("quant", "DESC")
                ->getQuery()
                ->getResult();
        }
    
    // return $this->createQueryBuilder('p')

    //     ->SELECT * FROM plat 
    //     ->JOIN commande on commande.id_plat = plat.id ;
    //     ->ORDER BY commande.quantite DESC LIMIT 3;
        

    //     ->join('plat on detail.plat_id'= 'plat.id')

    //     ->groupBy('p')

    //     ->addOrderBy('nbVentes', 'DESC')

    //     ->getQuery()

    //     ->getResult()

    // ;

    // return $this->createQueryBuilder('p')
    // ->select('p')
    // ->from('plat','p')
    // ->join(Detail::class,'d', 'WITH', 'p.id = d.plat')
    
    // ->where('d.plat_id = p.id')
    // ->groupBy('p')
    // ->orderBy('c.quantite', 'DESC')
    // ->setMaxResults(3)
    // ->getQuery()
    // ->getResult();

    


    // public function findByVentes(int $id) : array
    // {
    //     return $this->createQueryBuilder('p')
    //     ->where('p.categorie = :id')
    //     ->setParameter('id', $id)
    //     ->addOrderBy('p.id', 'ASC')
    //     ->getQuery()
    //     ->getResult()
    //     ;
    // }
    

//    /**
//     * @return Plat[] Returns an array of Plat objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Plat
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

}