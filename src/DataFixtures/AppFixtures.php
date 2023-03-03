<?php

namespace App\DataFixtures;

use App\Factory\EkurieFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        EkurieFactory::createMany(100);
    }
}
