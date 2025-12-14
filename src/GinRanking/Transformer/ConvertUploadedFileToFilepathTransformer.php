<?php

declare(strict_types=1);

namespace App\GinRanking\Transformer;

use App\Entity\GinRanking\Gin;
use App\GinRanking\Dto\GinUpsertDto;
use App\GinRanking\FileUploader\ImageUploader;
use League\Flysystem\FilesystemOperator;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\ObjectMapper\TransformCallableInterface;

/** @implements TransformCallableInterface<GinUpsertDto, Gin> */
final readonly class ConvertUploadedFileToFilepathTransformer implements TransformCallableInterface
{
    public function __construct(
        private FilesystemOperator $scalewayS3Storage,
        private ImageUploader $imageUploader,
    ) {
    }

    public function __invoke(mixed $value, object $source, ?object $target): mixed
    {
        // Dans le cas d'un update sans modifier l'image
        if ($value === null) {
            return $target?->imagePath;
        }

        if (!$value instanceof File) {
            throw new \LogicException('Should never happened, value of image is not an instance of ' . UploadedFile::class);
        }

        return $this->imageUploader->upload($this->scalewayS3Storage, $value);
    }
}
