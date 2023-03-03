<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use SebastianBergmann\Comparator\Factory;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        foreach(range(1,3) as $i) {
            $category = new Category();
            $category
                ->setTitle($faker->title())
            ;
            $manager->persist($category);
        }
        $manager->flush();
    }
}
