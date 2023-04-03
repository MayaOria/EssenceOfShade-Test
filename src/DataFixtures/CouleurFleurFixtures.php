<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\CouleurFleur;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class CouleurFleurFixtures extends Fixture
{       

    public function load(ObjectManager $manager): void
    {
        $couleur1 = new CouleurFleur();
        $couleur1->setNom("Aubergine");
        $manager->persist($couleur1);
        $couleur2 = new CouleurFleur();
        $couleur2->setNom("Beige naturel");
        $manager->persist($couleur2);
        $couleur3 = new CouleurFleur();
        $couleur3->setNom("Blanc");
        $manager->persist($couleur3);
        $couleur4 = new CouleurFleur();
        $couleur4->setNom("Bleu");
        $manager->persist($couleur4);
        $couleur5 = new CouleurFleur();
        $couleur5->setNom("Bleu clair");
        $manager->persist($couleur5);
        $couleur6 = new CouleurFleur();
        $couleur6->setNom("Brun");
        $manager->persist($couleur6);
        $couleur7 = new CouleurFleur();
        $couleur7->setNom("Corail");
        $manager->persist($couleur7);
        $couleur8 = new CouleurFleur();
        $couleur8->setNom("Crème");
        $manager->persist($couleur8);
        $couleur9 = new CouleurFleur();
        $couleur9->setNom("Fuchsia");
        $manager->persist($couleur9);
        $couleur10 = new CouleurFleur();
        $couleur10->setNom("Jaune");
        $couleur11 = new CouleurFleur();
        $couleur11->setNom("Jaune pâle");
        $manager->persist($couleur11);
        $couleur12 = new CouleurFleur();
        $couleur12->setNom("Lilas");
        $manager->persist($couleur12);
        $couleur13 = new CouleurFleur();
        $couleur13->setNom("Mauve");
        $manager->persist($couleur13);
        $couleur14 = new CouleurFleur();
        $couleur14->setNom("Orange");
        $manager->persist($couleur14);
        $couleur15 = new CouleurFleur();
        $couleur15->setNom("Pêche");
        $manager->persist($couleur15);
        $couleur16 = new CouleurFleur();
        $couleur16->setNom("Rose");
        $manager->persist($couleur16);
        $couleur17 = new CouleurFleur();
        $couleur17->setNom("Rose pâle");
        $manager->persist($couleur17);
        $couleur18 = new CouleurFleur();
        $couleur18->setNom("Rouge");
        $manager->persist($couleur18);
        $couleur19 = new CouleurFleur();
        $couleur19->setNom("Vert");
        $manager->persist($couleur19);
        $couleur20 = new CouleurFleur();
        $couleur20->setNom("Vert bleuté");
        $manager->persist($couleur20);
        $couleur21 = new CouleurFleur();
        $couleur21->setNom("Bordeaux");
        $manager->persist($couleur21);
        
        $manager->flush();

        
    }
}
