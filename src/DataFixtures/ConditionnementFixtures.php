<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Conditionnement;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class ConditionnementFixtures extends Fixture
{       

    public function load(ObjectManager $manager): void
    {
        $conditionnement1 = new Conditionnement();
        $conditionnement1->setNombre(1);
        $manager->persist($conditionnement1);
        $conditionnement2 = new Conditionnement();
        $conditionnement2->setNombre(5);
        $manager->persist($conditionnement2);
        $conditionnement3 = new Conditionnement();
        $conditionnement3->setNombre(10);
        $manager->persist($conditionnement3);
        $conditionnement4 = new Conditionnement();
        $conditionnement4->setNombre(20);
        $manager->persist($conditionnement4);
        $conditionnement5 = new Conditionnement();
        $conditionnement5->setNombre(25);
        $manager->persist($conditionnement5);
        $conditionnement6 = new Conditionnement();
        $conditionnement6->setNombre(30);
        $manager->persist($conditionnement6);
        $conditionnement7 = new Conditionnement();
        $conditionnement7->setNombre(50);
        $manager->persist($conditionnement7);
        
        $manager->flush();

        
    }
}
