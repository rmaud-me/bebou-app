<?php

declare(strict_types=1);

namespace App\GinRanking\Dto;

use App\Entity\GinRanking\Gin;
use App\Enum\GinRanking\CategoryEnum;
use App\GinRanking\Transformer\ConvertUploadedFileToFilepathTransformer;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\ObjectMapper\Attribute\Map;

#[Map(target: Gin::class)]
final class GinUpsertDto
{
    #[Map(if: false)]
    public ?int $id = null;
    public string $name;
    public CategoryEnum $category;
    #[Map(target: 'imagePath', transform: ConvertUploadedFileToFilepathTransformer::class)]
    public ?UploadedFile $image = null;
    public ?string $currentImagePath = null;
}
