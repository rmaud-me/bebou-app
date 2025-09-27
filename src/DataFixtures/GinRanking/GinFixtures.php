<?php

declare(strict_types=1);

namespace App\DataFixtures\GinRanking;

use App\Entity\GinRanking\Gin;
use App\Enum\GinRanking\CategoryEnum;
use App\GinRanking\FileUploader\FileUploader;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use League\Flysystem\FilesystemOperator;
use Symfony\Component\HttpFoundation\File\File;

class GinFixtures extends Fixture
{
    public function __construct(
        private readonly FileUploader $fileUploader,
        private readonly FilesystemOperator $ginImageStorage,
    ) {
    }

    public function load(ObjectManager $manager): void
    {
        $manager->persist($this->createGin('Ki No Tou ❤️❤️', CategoryEnum::LOVE, $this->moveAndResize('src/DataFixtures/GinRanking/images/ki-no-tou.png')));
        $manager->persist($this->createGin('Saffron', CategoryEnum::LOVE, $this->moveAndResize('src/DataFixtures/GinRanking/images/saffron.png')));
        $manager->persist($this->createGin('Hendrick\'s ❤️', CategoryEnum::LOVE, $this->moveAndResize('src/DataFixtures/GinRanking/images/hendricks.png')));
        $manager->persist($this->createGin('Bombay Dry Gin', CategoryEnum::LOVE, $this->moveAndResize('src/DataFixtures/GinRanking/images/bombay-dry-gin.png')));
        $manager->persist($this->createGin('Gunpowder ❤️', CategoryEnum::LOVE, $this->moveAndResize('src/DataFixtures/GinRanking/images/gunpowder.png')));
        $manager->persist($this->createGin('Bareksten', CategoryEnum::LOVE, $this->moveAndResize('src/DataFixtures/GinRanking/images/bareksten.png')));
        $manager->persist($this->createGin('Darnlay\'s (Original Gin)', CategoryEnum::LOVE, $this->moveAndResize('src/DataFixtures/GinRanking/images/darnlays.jpg')));
        $manager->persist($this->createGin('Mr. Tom\'s Spirits', CategoryEnum::LOVE, $this->moveAndResize('src/DataFixtures/GinRanking/images/mr-toms-spirit.jpg')));
        $manager->persist($this->createGin('Ragnarök', CategoryEnum::LOVE, $this->moveAndResize('src/DataFixtures/GinRanking/images/Ragnarok-Gin.jpg')));
        $manager->persist($this->createGin('The Illisionist 🤯', CategoryEnum::LOVE, $this->moveAndResize('src/DataFixtures/GinRanking/images/illusionist.jpg')));
        $manager->persist($this->createGin('Roku Gin', CategoryEnum::LOVE, $this->moveAndResize('src/DataFixtures/GinRanking/images/roku.jpg')));
        $manager->persist($this->createGin('Seagram’s Gin', CategoryEnum::LOVE, $this->moveAndResize('src/DataFixtures/GinRanking/images/seagrams-extra-dry-gin.jpg')));
        $manager->persist($this->createGin('Etsu gin ❤️', CategoryEnum::LOVE, $this->moveAndResize('src/DataFixtures/GinRanking/images/etsu-gin.png')));
        $manager->persist($this->createGin('Tanqueray', CategoryEnum::LOVE, $this->moveAndResize('src/DataFixtures/GinRanking/images/tanqueray.webp')));
        $manager->persist($this->createGin('Etsu Gin Yuzu', CategoryEnum::LOVE, $this->moveAndResize('src/DataFixtures/GinRanking/images/etsu-gin-yuzu.jpg')));
        $manager->persist($this->createGin('Bulldog', CategoryEnum::NEUTRAL, $this->moveAndResize('src/DataFixtures/GinRanking/images/bulldog.webp')));
        $manager->persist($this->createGin('Panda', CategoryEnum::NEUTRAL, $this->moveAndResize('src/DataFixtures/GinRanking/images/panda.webp')));
        $manager->persist($this->createGin('By the Dutch', CategoryEnum::NEUTRAL, $this->moveAndResize('src/DataFixtures/GinRanking/images/by-the-dutch.jpg')));
        $manager->persist($this->createGin('Naud Gin', CategoryEnum::NEUTRAL, $this->moveAndResize('src/DataFixtures/GinRanking/images/naud.jpg')));
        $manager->persist($this->createGin('Malfy (Con Lemon)', CategoryEnum::NEUTRAL, $this->moveAndResize('src/DataFixtures/GinRanking/images/malfy.jpg')));
        $manager->persist($this->createGin('Normindia 🤔', CategoryEnum::NEUTRAL, $this->moveAndResize('src/DataFixtures/GinRanking/images/normindia.jpg')));
        $manager->persist($this->createGin('Bombay Sapphire 😴', CategoryEnum::NEUTRAL, $this->moveAndResize('src/DataFixtures/GinRanking/images/bombay-sapphire.avif')));
        $manager->persist($this->createGin('Generous Gin Azur 🤔', CategoryEnum::NEUTRAL, $this->moveAndResize('src/DataFixtures/GinRanking/images/Generous-Gin-Azur.jpg')));
        $manager->persist($this->createGin('Jungle Gin 🤔', CategoryEnum::NEUTRAL, $this->moveAndResize('src/DataFixtures/GinRanking/images/jungle-gin.jpg')));
        $manager->persist($this->createGin('Akori Gin 🤔', CategoryEnum::NEUTRAL, $this->moveAndResize('src/DataFixtures/GinRanking/images/akori.webp')));
        $manager->persist($this->createGin('Birdie Shiso 🤔', CategoryEnum::NEUTRAL, $this->moveAndResize('src/DataFixtures/GinRanking/images/Gin-Birdie-Shiso.png')));
        $manager->persist($this->createGin('Birdie Kaffir 🤔', CategoryEnum::NEUTRAL, $this->moveAndResize('src/DataFixtures/GinRanking/images/birdie-gin-kaffir.jpg')));
        $manager->persist($this->createGin('Plymouth', CategoryEnum::HATE, $this->moveAndResize('src/DataFixtures/GinRanking/images/plymouth.jpg')));
        $manager->persist($this->createGin('Monkey 47', CategoryEnum::HATE, $this->moveAndResize('src/DataFixtures/GinRanking/images/monkey-47.jpg')));
        $manager->persist($this->createGin('Nordes', CategoryEnum::HATE, $this->moveAndResize('src/DataFixtures/GinRanking/images/nordes.png')));
        $manager->persist($this->createGin('G’vine 🪶= Bombay Saphire', CategoryEnum::HATE, $this->moveAndResize('src/DataFixtures/GinRanking/images/gvin.webp')));
        $manager->persist($this->createGin('Barmon’s ☠️', CategoryEnum::HATE, $this->moveAndResize('src/DataFixtures/GinRanking/images/barmons.webp')));
        $manager->persist($this->createGin('Pinkster', CategoryEnum::HATE, $this->moveAndResize('src/DataFixtures/GinRanking/images/pinkster.jpg')));
        $manager->persist($this->createGin('1528 - Qahwa', CategoryEnum::HATE, $this->moveAndResize('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Citadelle ☠️', CategoryEnum::HATE, $this->moveAndResize('src/DataFixtures/GinRanking/images/citadelle.jpg')));
        $manager->persist($this->createGin('King of Soho', CategoryEnum::HATE, $this->moveAndResize('src/DataFixtures/GinRanking/images/king-of-soho.webp')));
        $manager->persist($this->createGin('Beefeater ☠️', CategoryEnum::HATE, $this->moveAndResize('src/DataFixtures/GinRanking/images/beefeater.webp')));
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
        return $this->fileUploader->upload($this->ginImageStorage, new File($fileToFixtures));
    }
}
