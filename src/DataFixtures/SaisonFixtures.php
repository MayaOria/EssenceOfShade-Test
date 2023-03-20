<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Saison;
use App\Entity\CouleurFleur;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class SaisonFixtures extends Fixture
{     

    public function load(ObjectManager $manager): void
    {
        $saison1 = new Saison();
        $saison1->setMois("Janvier");
        $manager->persist($saison1);
        $saison2 = new Saison();
        $saison2->setMois("Février");
        $manager->persist($saison2);
        $saison3 = new Saison();
        $saison3->setMois("Mars");
        $manager->persist($saison3);
        $saison4 = new Saison();
        $saison4->setMois("Avril");
        $manager->persist($saison4);
        $saison5 = new Saison();
        $saison5->setMois("Mai");
        $manager->persist($saison5);
        $saison6 = new Saison();
        $saison6->setMois("Juin");
        $manager->persist($saison6);
        $saison7 = new Saison();
        $saison7->setMois("Juillet");
        $manager->persist($saison7);
        $saison8 = new Saison();
        $saison8->setMois("Août");
        $manager->persist($saison8);
        $saison9 = new Saison();
        $saison9->setMois("Septembre");
        $manager->persist($saison9);
        $saison10 = new Saison();
        $saison10->setMois("Octobre");
        $manager->persist($saison10);
        $saison11 = new Saison();
        $saison11->setMois("Novembre");
        $manager->persist($saison11);
        $saison12 = new Saison();
        $saison12->setMois("Décembre");
        $manager->persist($saison12);
        
        
        $manager->flush();

        
    }
}