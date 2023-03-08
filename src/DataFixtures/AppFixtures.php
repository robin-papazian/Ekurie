<?php

namespace App\DataFixtures;

use App\Factory\EkurieFactory;
use App\Factory\SemesterFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        EkurieFactory::createMany(10);
        SemesterFactory::createMany(50, function () {
            return [
                'ekurie_id' => EkurieFactory::random(),
            ];
        });
    }
}
