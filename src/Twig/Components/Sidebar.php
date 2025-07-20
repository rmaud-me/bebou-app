<?php

declare(strict_types=1);

namespace App\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(template: 'components/Sidebar.html.twig')]
class Sidebar
{
    public const PICTURE_TYPE_EMOJI = 'emoji';
    public const PICTURE_TYPE_ICON = 'icon';

    /**
     * @return array<mixed>
     */
    public function getItems(): array
    {
        return [
            [
                'name' => 'Menu',
                'isTitle' => true,
            ],
            [
                'name' => 'Home',
                'isTitle' => false,
                'url' => 'home',
                'pictureType' => self::PICTURE_TYPE_ICON,
                'icon' => 'house-fill',
            ],
            [
                'name' => 'DMC Finder',
                'isTitle' => false,
                'url' => 'dmc_finder_main',
                'pictureType' => self::PICTURE_TYPE_EMOJI,
                'emoji' => '🧵',
            ],
            [
                'name' => 'Gin Ranking',
                'isTitle' => false,
                'url' => 'gin_ranking_main',
                'pictureType' => self::PICTURE_TYPE_EMOJI,
                'emoji' => '🍾',
            ],
        ];
    }
}
