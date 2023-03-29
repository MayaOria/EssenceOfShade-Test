<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\TypeCompo;
use App\Entity\Composition;

use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class CompositionFixtures extends Fixture implements OrderedFixtureInterface
{       

    public function getOrder()
    {
        return 2;
    }
    public function load(ObjectManager $manager): void
    {
        $rep = $manager->getRepository(TypeCompo::class);
        $types = $rep->findAll();
        

        $compo1 = new Composition();
        $compo1->setNom("grand bouquet");
        $compo1->setTypeCompo($types[0]);
        $manager->persist($compo1);
        $compo2 = new Composition();
        $compo2->setNom("centre XXL");
        $compo2->setTypeCompo($types[1]);
        $manager->persist($compo2);
        $compo3 = new Composition();
        $compo3->setNom("boutonnière orange");
        $compo3->setTypeCompo($types[2]);
        $manager->persist($compo3);
        $compo4 = new Composition();
        $compo4->setNom("grande arche");
        $compo4->setTypeCompo($types[3]);
        $manager->persist($compo4);
        
        $manager->flush();

        
    }
}
