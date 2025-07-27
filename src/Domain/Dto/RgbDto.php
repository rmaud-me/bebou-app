<?php

declare(strict_types=1);

namespace App\Domain\Dto;

readonly class RgbDto
{
    public function __construct(
        public int $red,
        public int $green,
        public int $blue,
    ) {
    }

    /**
     * Used in RdbFinder template.
     */
    public function toHexa(): string
    {
        return \sprintf('#%02x%02x%02x', $this->red, $this->green, $this->blue);
    }

    public static function createFromHexa(string $hexa): self
    {
        // Cas d'un short hexa, il faut doubler chaque caractère
        if (\strlen($hexa) === 4) {
            $explodeHexa = \str_split(\str_replace('#', '', $hexa));
            $hexa = \sprintf('#%s%s%s%s%s%s', $explodeHexa[0], $explodeHexa[0], $explodeHexa[1], $explodeHexa[1], $explodeHexa[2], $explodeHexa[2]);
        }

        /** @var int[] $result */
        $result = \sscanf($hexa, '#%02x%02x%02x');

        return new self(...$result);
    }
}
