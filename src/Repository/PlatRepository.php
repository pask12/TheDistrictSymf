<?php

namespace App\Repository;

use App\Entity\Plat;
use App\Entity\Detail;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @extends ServiceEntityRepository<Plat>
 */
class PlatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Plat::class);
    }
    
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
    
        public function recherchePlats(string $motcle): array
        {
    
            return $this->createQueryBuilder('p')
    
                ->select('p')
                ->where('p.libelle LIKE :motcle')
                ->setParameter('motcle', '%' . $motcle . '%')
                ->getQuery()
                ->getResult();
    
        }
  
}