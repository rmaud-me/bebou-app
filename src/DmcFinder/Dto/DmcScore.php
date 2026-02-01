<?php

declare(strict_types=1);

namespace App\DmcFinder\Dto;

readonly class DmcScore
{
    public function __construct(
        public int $diffRed,
        public int $diffGreen,
        public int $diffBlue,
    ) {
    }

    public function getTotal(): int
    {
        return \abs($this->diffRed) + \abs($this->diffGreen) + \abs($this->diffBlue);
    }
}
