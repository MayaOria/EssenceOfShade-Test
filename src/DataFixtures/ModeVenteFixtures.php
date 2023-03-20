<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\ModeVente;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class ModeVenteFixtures extends Fixture
{       

    public function load(ObjectManager $manager): void
    {
        $modeVente1 = new ModeVente();
        $modeVente1->setNom("Tigée");
        $manager->persist($modeVente1);
        $modeVente2 = new ModeVente();
        $modeVente2->setNom("Botte");
        $manager->persist($modeVente2);
        
        
        $manager->flush();

        
    }

    
}
