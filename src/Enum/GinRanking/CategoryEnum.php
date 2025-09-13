<?php

namespace App\Enum\GinRanking;

use Symfony\Contracts\Translation\TranslatableInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

enum CategoryEnum: int implements TranslatableInterface
{
    case LOVE = 100;
    CASE NEUTRAL = 50;
    CASE HATE = 0;

    public function trans(TranslatorInterface $translator, ?string $locale = null): string
    {
        return $translator->trans('gin_ranking.category.value.'.match ($this) {
                self::LOVE => 'love',
                self::NEUTRAL => 'neutral',
                self::HATE => 'hate',
            },
            locale: $locale
        );
    }
}
