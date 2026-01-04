<?php

declare(strict_types=1);

namespace App\DmcFinder\Repository;

use App\DmcFinder\DmcColorRepositoryInterface;
use App\DmcFinder\Dto\DmcDto;
use App\DmcFinder\Dto\RgbDto;

readonly class DmcColorRepository implements DmcColorRepositoryInterface
{
    public function getAllDmc(): iterable
    {
        $dmcColorData = \file_get_contents(__DIR__ . '/../../../data/dmc.json');
        if ($dmcColorData === false) {
            throw new \RuntimeException('File dmc.json not load');
        }

        foreach (\json_decode($dmcColorData, true) as $dmc) {
            yield new DmcDto($dmc['dmc'], $dmc['name'], new RgbDto((int) $dmc['color']['r'], (int) $dmc['color']['g'], (int) $dmc['color']['b']));
        }
    }
}
