<?php

namespace App\DataFixtures;

use App\Entity\User;


use App\Entity\Moodboard;
use App\Entity\TypeEvenement;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class MoodboardFixtures extends Fixture 
{       

    public function load(ObjectManager $manager): void
    {
        $color1 = new Moodboard();
        $color1->setCodeCouleur("#e66465");
        $manager->persist($color1);
        $color2 = new Moodboard();
        $color2->setCodeCouleur("#f6b73c");
        $manager->persist($color2);
        $color3 = new Moodboard();
        $color3->setCodeCouleur("BBD6B8");
        $manager->persist($color3);
        $color4 = new Moodboard();
        $color4->setCodeCouleur("#FEBE8C");
        $manager->persist($color4);
        $color5 = new Moodboard();
        $color5->setCodeCouleur("D61355");
        $manager->persist($color5);
        $color6 = new Moodboard();
        $color6->setCodeCouleur("#37306B");
        $manager->persist($color6);
        $color7 = new Moodboard();
        $color7->setCodeCouleur("#66347F");
        $manager->persist($color7);
        $color8 = new Moodboard();
        $color8->setCodeCouleur("9E4784");
        $manager->persist($color8);
        $color9 = new Moodboard();
        $color9->setCodeCouleur("D27685");
        $manager->persist($color9);
        $color10 = new Moodboard();
        $color10->setCodeCouleur("0E8388");
        $manager->persist($color10);
        
        
        $manager->flush();

    }
}