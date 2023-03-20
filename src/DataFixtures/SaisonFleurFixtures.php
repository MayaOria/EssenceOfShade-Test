<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Fleur;
use App\Entity\ModeVente;
use App\Entity\CouleurFleur;
use App\Entity\Conditionnement;
use App\Entity\Saison;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class SaisonFleurFixtures extends Fixture implements DependentFixtureInterface
{       

    public function load(ObjectManager $manager): void
    {
        
        $rep = $manager->getRepository(Fleur::class);
        $fleurs = $rep->findAll();
        $rep = $manager->getRepository(Saison::class);
        $saisons = $rep->findAll();
        

        foreach ($fleurs as $fleur)
        {
            for($i = 0; $i < rand(1, 4); $i++)
            {
                $fleur->addSaison($saisons[rand(0, count($saisons)-1)]);
            }
            $manager->persist($fleur);
        }

        $manager->flush();
        }      

    public function getDependencies()
    {
        return ([
            SaisonFixtures::class,
            ConditionnementFixtures::class,
            CouleurFleurFixtures::class,
            ModeVenteFixtures::class,
            UserFixtures::class,
            FleurFixtures::class,
            
        ]);
    }
}

