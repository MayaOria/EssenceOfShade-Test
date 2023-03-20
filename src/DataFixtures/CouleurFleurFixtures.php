<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\CouleurFleur;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class CouleurFleurFixtures extends Fixture
{
    private $passwordHasher;

    

    public function load(ObjectManager $manager): void
    {
        $couleur1 = new CouleurFleur();
        $couleur1->setNom("Blanc");
        $manager->persist($couleur1);
        $couleur2 = new CouleurFleur();
        $couleur2->setNom("Rose");
        $manager->persist($couleur2);
        $couleur3 = new CouleurFleur();
        $couleur3->setNom("Rouge");
        $manager->persist($couleur3);
        $couleur4 = new CouleurFleur();
        $couleur4->setNom("Jaune");
        $manager->persist($couleur4);
        $couleur5 = new CouleurFleur();
        $couleur5->setNom("Orange");
        $manager->persist($couleur5);
        
        $manager->flush();

        
    }
}
