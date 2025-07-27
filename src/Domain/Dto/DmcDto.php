<?php

declare(strict_types=1);

namespace App\Domain\Dto;

readonly class DmcDto
{
    public function __construct(
        public string $number,
        public string $name,
        public RgbDto $rgb,
    ) {
    }
}
