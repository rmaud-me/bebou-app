<?php

declare(strict_types=1);

namespace App\Entity\GinRanking;

use App\Enum\GinRanking\CategoryEnum;
use App\GinRanking\Dto\GinUpsertDto;
use App\Repository\GinRanking\GinRepository;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Symfony\Component\ObjectMapper\Attribute\Map;
use Symfony\Component\Validator\Constraints\NotBlank;

#[Entity(repositoryClass: GinRepository::class)]
#[Map(target: GinUpsertDto::class)]
class Gin
{
    #[Id]
    #[GeneratedValue]
    #[Column]
    public ?int $id = null;

    #[Column]
    #[NotBlank(allowNull: false)]
    public string $name;

    #[Column]
    #[NotBlank(allowNull: false)]
    public CategoryEnum $category;

    #[Column]
    #[NotBlank(allowNull: false)]
    #[Map(target: 'currentImagePath')]
    public string $imagePath;
}
