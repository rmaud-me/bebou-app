<?php

declare(strict_types=1);

namespace App\DmcFinder\Dto;

readonly class DmcResultDto
{
    public function __construct(
        public DmcDto $dmc,
        public DmcScore $score,
    ) {
    }
}
