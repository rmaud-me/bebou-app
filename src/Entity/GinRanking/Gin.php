<?php

namespace App\Entity\GinRanking;

use App\Enum\GinRanking\CategoryEnum;
use App\Repository\GinRanking\GinRepository;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

#[Entity(repositoryClass: GinRepository::class)]
class Gin
{
    #[Id]
    #[GeneratedValue]
    #[Column]
    public ?int $id = null;
    #[Column]
    public string $name;
    #[Column]
    public CategoryEnum $category;
}
