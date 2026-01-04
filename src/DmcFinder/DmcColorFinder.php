<?php

declare(strict_types=1);

namespace App\DmcFinder;

use App\DmcFinder\Dto\DmcResultDto;
use App\DmcFinder\Dto\DmcScore;
use App\DmcFinder\Dto\RgbDto;

readonly class DmcColorFinder
{
    public function __construct(private DmcColorRepositoryInterface $dmcColorRepository)
    {
    }

    public function findClosest(RgbDto $rgb): ?DmcResultDto
    {
        $currentDiff = 90000;
        $closestDmc = null;

        foreach ($this->dmcColorRepository->getAllDmc() as $dmc) {
            $diff = \abs($rgb->red - $dmc->rgb->red) + \abs($rgb->green - $dmc->rgb->green) + \abs($rgb->blue - $dmc->rgb->blue);

            if ($diff < $currentDiff) {
                $currentDiff = \min($currentDiff, $diff);
                $closestDmc = new DmcResultDto($dmc, new DmcScore($rgb->red - $dmc->rgb->red, $rgb->green - $dmc->rgb->green, $rgb->blue - $dmc->rgb->blue));
            }

            if ($currentDiff === 0) {
                return $closestDmc;
            }
        }

        return $closestDmc;
    }
}
