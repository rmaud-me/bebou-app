<?php

declare(strict_types=1);

namespace App\Dto;

use League\Flysystem\FilesystemOperator;

final readonly class RemoveFileDto
{
    public function __construct(public FilesystemOperator $filesystemOperator, public string $path)
    {
    }
}
