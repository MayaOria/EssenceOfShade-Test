<?php

namespace App\DataFixtures;

use App\Entity\Prestataire;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class PrestataireFixtures extends Fixture
{
  
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 5; $i++)
        {
            $prestataire = new Prestataire();
            $prestataire->setNomSociete('Société'.$i);
            $prestataire->setNomContact('Contact'.$i);
            $prestataire->setEmail('Email'.$i);
            $prestataire->setTelephone('00000'.$i);
            $prestataire->setTva('BE000 '.$i);

            

            $manager->persist($prestataire);
            
            
        }
        
        $manager->flush();

        
    }
}
