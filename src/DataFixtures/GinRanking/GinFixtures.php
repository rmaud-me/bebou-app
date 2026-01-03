<?php

declare(strict_types=1);

namespace App\DataFixtures\GinRanking;

use App\Entity\GinRanking\Gin;
use App\Enum\GinRanking\CategoryEnum;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use League\Flysystem\FilesystemOperator;
use Symfony\Component\HttpFoundation\File\File;

class GinFixtures extends Fixture
{
    public function __construct(
        private readonly FilesystemOperator $scalewayS3Storage,
    ) {
    }

    public function load(ObjectManager $manager): void
    {
        $manager->persist($this->createGin('Ki No Tou ❤️❤️', CategoryEnum::LOVE, $this->uploadFile('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Saffron', CategoryEnum::LOVE, $this->uploadFile('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Hendrick\'s ❤️', CategoryEnum::LOVE, $this->uploadFile('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Bombay Dry Gin', CategoryEnum::LOVE, $this->uploadFile('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Gunpowder ❤️', CategoryEnum::LOVE, $this->uploadFile('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Bareksten', CategoryEnum::LOVE, $this->uploadFile('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Darnlay\'s (Original Gin)', CategoryEnum::LOVE, $this->uploadFile('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Mr. Tom\'s Spirits', CategoryEnum::LOVE, $this->uploadFile('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Ragnarök', CategoryEnum::LOVE, $this->uploadFile('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('The Illisionist 🤯', CategoryEnum::LOVE, $this->uploadFile('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Roku Gin', CategoryEnum::LOVE, $this->uploadFile('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Seagram’s Gin', CategoryEnum::LOVE, $this->uploadFile('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Etsu gin ❤️', CategoryEnum::LOVE, $this->uploadFile('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Tanqueray', CategoryEnum::LOVE, $this->uploadFile('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Etsu Gin Yuzu', CategoryEnum::LOVE, $this->uploadFile('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Bulldog', CategoryEnum::NEUTRAL, $this->uploadFile('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Panda', CategoryEnum::NEUTRAL, $this->uploadFile('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('By the Dutch', CategoryEnum::NEUTRAL, $this->uploadFile('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Naud Gin', CategoryEnum::NEUTRAL, $this->uploadFile('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Malfy (Con Lemon)', CategoryEnum::NEUTRAL, $this->uploadFile('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Normindia 🤔', CategoryEnum::NEUTRAL, $this->uploadFile('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Bombay Sapphire 😴', CategoryEnum::NEUTRAL, $this->uploadFile('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Generous Gin Azur 🤔', CategoryEnum::NEUTRAL, $this->uploadFile('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Jungle Gin 🤔', CategoryEnum::NEUTRAL, $this->uploadFile('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Akori Gin 🤔', CategoryEnum::NEUTRAL, $this->uploadFile('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Birdie Shiso 🤔', CategoryEnum::NEUTRAL, $this->uploadFile('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Birdie Kaffir 🤔', CategoryEnum::NEUTRAL, $this->uploadFile('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Plymouth', CategoryEnum::HATE, $this->uploadFile('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Monkey 47', CategoryEnum::HATE, $this->uploadFile('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Nordes', CategoryEnum::HATE, $this->uploadFile('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('G’vine 🪶= Bombay Saphire', CategoryEnum::HATE, $this->uploadFile('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Barmon’s ☠️', CategoryEnum::HATE, $this->uploadFile('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Pinkster', CategoryEnum::HATE, $this->uploadFile('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('1528 - Qahwa', CategoryEnum::HATE, $this->uploadFile('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Citadelle ☠️', CategoryEnum::HATE, $this->uploadFile('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('King of Soho', CategoryEnum::HATE, $this->uploadFile('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
        $manager->persist($this->createGin('Beefeater ☠️', CategoryEnum::HATE, $this->uploadFile('src/DataFixtures/GinRanking/images/1528-qahwa.png')));
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

    private function uploadFile(string $fileToFixtures): string
    {
        $file = new File($fileToFixtures);

        $filename = $file->getFilename();
        $file = $file->move($file->getPath(), $filename);
        $this->scalewayS3Storage->write($filename, $file->getContent());

        return $filename;
    }
}
