<?php

namespace App\DataFixtures;

use App\Entity\User;


use App\Entity\TypeEvenement;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class TypeEvenementFixtures extends Fixture implements OrderedFixtureInterface
{       
public function getOrder(){
    return 1;
}
    public function load(ObjectManager $manager): void
    {
        $type1 = new TypeEvenement();
        $type1->setNom("Mariage");
        $manager->persist($type1);
        $type2 = new TypeEvenement();
        $type2->setNom("Shooting");
        $manager->persist($type2);
        $type3 = new TypeEvenement();
        $type3->setNom("Décoration");
        $manager->persist($type3);
        
        $manager->flush();

    }
}