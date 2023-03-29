<?php

namespace App\DataFixtures;

use App\Entity\User;

use App\Entity\TypeCompo;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class TypeCompoFixtures extends Fixture implements OrderedFixtureInterface
{       
public function getOrder(){
    return 1;
}
    public function load(ObjectManager $manager): void
    {
        $type1 = new TypeCompo();
        $type1->setNom("Bouquet de mariée");
        $manager->persist($type1);
        $type2 = new TypeCompo();
        $type2->setNom("Centre de table");
        $manager->persist($type2);
        $type3 = new TypeCompo();
        $type3->setNom("Boutonnière");
        $manager->persist($type3);
        $type4 = new TypeCompo();
        $type4->setNom("Arche");
        $manager->persist($type4);
        $manager->flush();

    }
}