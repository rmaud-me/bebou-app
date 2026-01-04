<?php

declare(strict_types=1);

namespace App\DmcFinder;

use App\DmcFinder\Dto\DmcDto;

interface DmcColorRepositoryInterface
{
    /** @return iterable<DmcDto> */
    public function getAllDmc(): iterable;
}
