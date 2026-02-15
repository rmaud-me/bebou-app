<?php

declare(strict_types=1);

namespace App\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(template: 'components/sidebar.html.twig')]
class Sidebar
{
    public const string PICTURE_TYPE_EMOJI = 'emoji';
    public const string PICTURE_TYPE_ICON = 'icon';

    /**
     * @return array<mixed>
     */
    public function getItems(): array
    {
        return [
            [
                'name' => 'menu.title',
                'isTitle' => true,
            ],
            [
                'name' => 'menu.items.home',
                'isTitle' => false,
                'url' => 'home',
                'pictureType' => self::PICTURE_TYPE_ICON,
                'icon' => 'mynaui:home',
            ],
            [
                'name' => 'menu.items.dmc_finder',
                'isTitle' => false,
                'url' => 'dmc_finder_main',
                'pictureType' => self::PICTURE_TYPE_EMOJI,
                'emoji' => '🧵',
            ],
            [
                'name' => 'menu.items.gin_ranking',
                'isTitle' => false,
                'url' => 'gin_ranking_main',
                'pictureType' => self::PICTURE_TYPE_EMOJI,
                'emoji' => '🍾',
            ],
        ];
    }
}
