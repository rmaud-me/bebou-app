<?php

namespace App\DataFixtures\GinRanking;

use App\Entity\GinRanking\Gin;
use App\Enum\GinRanking\CategoryEnum;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class GinFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $manager->persist(new Gin('Saffron', CategoryEnum::LOVE));
        $manager->persist(new Gin('Hendrick\'s', CategoryEnum::LOVE));
        $manager->persist(new Gin('Bombay Dry Gin', CategoryEnum::LOVE));
        $manager->persist(new Gin('Gunpowder', CategoryEnum::LOVE));
        $manager->persist(new Gin('Bareksten', CategoryEnum::LOVE));
        $manager->persist(new Gin('Darnlay\'s (Original Gin)', CategoryEnum::LOVE));
        $manager->persist(new Gin('Mr. Tom\'s Spirits', CategoryEnum::LOVE));
        $manager->persist(new Gin('Ki No Tou', CategoryEnum::LOVE));
        $manager->persist(new Gin('Ragnarök', CategoryEnum::LOVE));
        $manager->persist(new Gin('The Illisionist', CategoryEnum::LOVE));
        $manager->persist(new Gin('Roku Gin', CategoryEnum::LOVE));
        $manager->persist(new Gin('Seagram’s Gin', CategoryEnum::LOVE));
        $manager->persist(new Gin('Etsu gin', CategoryEnum::LOVE));
        $manager->persist(new Gin('Tanqueray', CategoryEnum::LOVE));
        $manager->persist(new Gin('Etsu Gin Yuzu', CategoryEnum::LOVE));
        $manager->persist(new Gin('Bulldog', CategoryEnum::NEUTRAL));
        $manager->persist(new Gin('Panda', CategoryEnum::NEUTRAL));
        $manager->persist(new Gin('By the Dutch', CategoryEnum::NEUTRAL));
        $manager->persist(new Gin('Naud Gin', CategoryEnum::NEUTRAL));
        $manager->persist(new Gin('Malfy (Con Lemon)', CategoryEnum::NEUTRAL));
        $manager->persist(new Gin('Normindia', CategoryEnum::NEUTRAL));
        $manager->persist(new Gin('Bombay Sapphire', CategoryEnum::NEUTRAL));
        $manager->persist(new Gin('Generous Gin Azur', CategoryEnum::NEUTRAL));
        $manager->persist(new Gin('Jungle Gin', CategoryEnum::NEUTRAL));
        $manager->persist(new Gin('Akori Gin', CategoryEnum::NEUTRAL));
        $manager->persist(new Gin('Birdie Shiso', CategoryEnum::NEUTRAL));
        $manager->persist(new Gin('Plymouth', CategoryEnum::HATE));
        $manager->persist(new Gin('Monkey 47', CategoryEnum::HATE));
        $manager->persist(new Gin('Nordes', CategoryEnum::HATE));
        $manager->persist(new Gin('G’vine 🪶= Bombay Saphire', CategoryEnum::HATE));
        $manager->persist(new Gin('Barmon’s', CategoryEnum::HATE));
        $manager->persist(new Gin('Pinkster', CategoryEnum::HATE));
        $manager->persist(new Gin('1528 - Qahwa', CategoryEnum::HATE));
        $manager->persist(new Gin('Citadelle', CategoryEnum::HATE));
        $manager->persist(new Gin('King of Soho', CategoryEnum::HATE));
        $manager->persist(new Gin('Beefeater', CategoryEnum::HATE));
        $manager->flush();
    }
}
