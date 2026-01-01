<?php

declare(strict_types=1);

namespace App\GinRanking;

use Imagine\Gd\Imagine;
use Imagine\Image\Box;

final class ImageOptimizer
{
    private const int MAX_HEIGHT = 500;

    private Imagine $imagine;

    public function __construct()
    {
        $this->imagine = new Imagine();
    }

    public function resize(string $filename): void
    {
        $sizes = \getimagesize($filename);

        if (!$sizes) {
            throw new \LogicException('Cannot getting size of ' . $filename);
        }

        [$iheight, $iwidth] = $sizes;

        if ($iheight > self::MAX_HEIGHT) {
            $iwidth = $iwidth * self::MAX_HEIGHT / $iheight;
        }

        $photo = $this->imagine->open($filename);
        $photo->resize(new Box((int) $iwidth, (int) $iheight))->save($filename);
    }
}
