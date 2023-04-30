<?php

namespace App\DataFixtures;

use App\Entity\ExpenseCategory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ExpenseCategoryFixtures extends Fixture {

    public function load(ObjectManager $manager): void {

        $names = [
            'Emergency',
            'Entertainment',
            'Essential',
            'Family',
            'Feeding',
            'Utility',
        ];

        foreach ($names as $name) {
            $manager->persist(new ExpenseCategory($name));
        }

        $manager->flush();
    }
}