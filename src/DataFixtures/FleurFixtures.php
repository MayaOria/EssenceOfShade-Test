<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Fleur;
use App\Entity\ModeVente;
use App\Entity\CouleurFleur;
use App\Entity\Conditionnement;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class FleurFixtures extends Fixture implements DependentFixtureInterface
{       

    public function load(ObjectManager $manager): void
    {
        
        $rep = $manager->getRepository(CouleurFleur::class);
        $couleurs = $rep->findAll();
        $rep = $manager->getRepository(ModeVente::class);
        $modesVente = $rep->findAll();
        $rep = $manager->getRepository(Conditionnement::class);
        $conditionnements = $rep->findAll();
        $rep = $manager->getRepository(User::class);
        $users = $rep->findAll();

        for($i = 1; $i <= 10; $i++)
        
        {
            $couleurChoisie = $couleurs[rand(0, count($couleurs)-1)];
            $conditionnementChoisi = $conditionnements[rand(0, count($conditionnements)-1)];
            $modeVenteChoisi = $modesVente[rand(0, count($modesVente)-1)];
            $userChoisi = $users[rand(0, count($users)-1)];
            

            $fleur = new Fleur();
            $fleur->setNom("fleur".$i);
            $fleur->setPrix(0.10);
            $fleur->setImage("images/fleur".$i.".png");
            $fleur->setRemarques("remarque n° ".$i);

            $fleur->setCouleurFleur($couleurChoisie);
            $fleur->setConditionnement($conditionnementChoisi);
            $fleur->setModeVente($modeVenteChoisi);
            $fleur->setUser($userChoisi);

            $manager->persist($fleur);
        }

        
        
        
        $manager->flush();

        
    }

    public function getDependencies()
    {
        return ([
            ConditionnementFixtures::class,
            CouleurFleurFixtures::class,
            ModeVenteFixtures::class,
            UserFixtures::class,
            SaisonFixtures::class,
        ]);
    }
}

