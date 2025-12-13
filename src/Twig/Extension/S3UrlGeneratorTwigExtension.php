<?php

declare(strict_types=1);

namespace App\Twig\Extension;

use League\Flysystem\FilesystemOperator;
use Twig\Attribute\AsTwigFunction;

class S3UrlGeneratorTwigExtension
{
    public function __construct(
        private FilesystemOperator $scalewayS3Storage,
    ) {
    }

    #[AsTwigFunction('asset_s3')]
    public function assetS3(string $path): string
    {
        return $this->scalewayS3Storage->publicUrl($path);
    }
}
