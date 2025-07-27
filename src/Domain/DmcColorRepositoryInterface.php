<?php

declare(strict_types=1);

namespace App\Domain;

use App\Domain\Dto\DmcDto;

interface DmcColorRepositoryInterface
{
    /** @return iterable<DmcDto> */
    public function getAllDmc(): iterable;
}
