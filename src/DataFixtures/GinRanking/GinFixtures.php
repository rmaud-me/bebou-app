<?php

declare(strict_types=1);

namespace App\DataFixtures\GinRanking;

use App\Entity\GinRanking\Gin;
use App\Enum\GinRanking\CategoryEnum;
use App\GinRanking\FileUploader\ImageUploader;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use League\Flysystem\FilesystemOperator;
use Symfony\Component\HttpFoundation\File\File;

class GinFixtures extends Fixture
{
    public function __construct(
        private readonly ImageUploader $imageUploader,
        private readonly FilesystemOperator $scalewayS3Storage,
    ) {
    }

    public function load(ObjectManager $manager): void
    {
        $manager->persist($this->createGin('Ki No Tou ❤️❤️', CategoryEnum::LOVE, $this->moveAndResize('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Saffron', CategoryEnum::LOVE, $this->moveAndResize('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Hendrick\'s ❤️', CategoryEnum::LOVE, $this->moveAndResize('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Bombay Dry Gin', CategoryEnum::LOVE, $this->moveAndResize('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Gunpowder ❤️', CategoryEnum::LOVE, $this->moveAndResize('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Bareksten', CategoryEnum::LOVE, $this->moveAndResize('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Darnlay\'s (Original Gin)', CategoryEnum::LOVE, $this->moveAndResize('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Mr. Tom\'s Spirits', CategoryEnum::LOVE, $this->moveAndResize('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Ragnarök', CategoryEnum::LOVE, $this->moveAndResize('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('The Illisionist 🤯', CategoryEnum::LOVE, $this->moveAndResize('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Roku Gin', CategoryEnum::LOVE, $this->moveAndResize('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Seagram’s Gin', CategoryEnum::LOVE, $this->moveAndResize('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Etsu gin ❤️', CategoryEnum::LOVE, $this->moveAndResize('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Tanqueray', CategoryEnum::LOVE, $this->moveAndResize('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Etsu Gin Yuzu', CategoryEnum::LOVE, $this->moveAndResize('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Bulldog', CategoryEnum::NEUTRAL, $this->moveAndResize('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Panda', CategoryEnum::NEUTRAL, $this->moveAndResize('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('By the Dutch', CategoryEnum::NEUTRAL, $this->moveAndResize('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Naud Gin', CategoryEnum::NEUTRAL, $this->moveAndResize('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Malfy (Con Lemon)', CategoryEnum::NEUTRAL, $this->moveAndResize('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Normindia 🤔', CategoryEnum::NEUTRAL, $this->moveAndResize('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Bombay Sapphire 😴', CategoryEnum::NEUTRAL, $this->moveAndResize('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Generous Gin Azur 🤔', CategoryEnum::NEUTRAL, $this->moveAndResize('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Jungle Gin 🤔', CategoryEnum::NEUTRAL, $this->moveAndResize('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Akori Gin 🤔', CategoryEnum::NEUTRAL, $this->moveAndResize('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Birdie Shiso 🤔', CategoryEnum::NEUTRAL, $this->moveAndResize('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Birdie Kaffir 🤔', CategoryEnum::NEUTRAL, $this->moveAndResize('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Plymouth', CategoryEnum::HATE, $this->moveAndResize('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Monkey 47', CategoryEnum::HATE, $this->moveAndResize('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Nordes', CategoryEnum::HATE, $this->moveAndResize('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('G’vine 🪶= Bombay Saphire', CategoryEnum::HATE, $this->moveAndResize('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Barmon’s ☠️', CategoryEnum::HATE, $this->moveAndResize('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Pinkster', CategoryEnum::HATE, $this->moveAndResize('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('1528 - Qahwa', CategoryEnum::HATE, $this->moveAndResize('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Citadelle ☠️', CategoryEnum::HATE, $this->moveAndResize('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('King of Soho', CategoryEnum::HATE, $this->moveAndResize('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Beefeater ☠️', CategoryEnum::HATE, $this->moveAndResize('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->flush();
    }

    private function createGin(string $name, CategoryEnum $categoryEnum, string $imagePath): Gin
    {
        $gin = new Gin();
        $gin->name = $name;
        $gin->category = $categoryEnum;
        $gin->imagePath = $imagePath;

        return $gin;
    }

    private function moveAndResize(string $fileToFixtures): string
    {
        return $this->imageUploader->upload($this->scalewayS3Storage, new File($fileToFixtures));
    }
}
