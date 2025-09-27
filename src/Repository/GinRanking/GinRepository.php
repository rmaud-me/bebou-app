<?php

declare(strict_types=1);

namespace App\Repository\GinRanking;

use App\Entity\GinRanking\Gin;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/** @extends ServiceEntityRepository<Gin> */
class GinRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Gin::class);
    }
}
