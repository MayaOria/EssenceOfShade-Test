<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this -> passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        
            $user = new User();
            $user->setNom('Danhaive');
            $user->setPrenom('Céline');
            $user->setSociete('Essence of Shade');
            $user->setTelephone('+32 499290632');
            $user->setAdresse('');
            $user->setTva('BE0');

            $user->setPassword(
                $this->passwordHasher->hashPassword($user, "alorat116")
            );
            $user->setEmail('c.danhaive@gmail.com');
            $manager->persist($user);

            $user = new User();
            $user->setNom('Orianne');
            $user->setPrenom('Maya');
            $user->setSociete('');
            $user->setTelephone('+32 496181647');
            $user->setAdresse('');
            $user->setTva('BE0');

            $user->setPassword(
                $this->passwordHasher->hashPassword($user, "alorat116")
            );
            $user->setEmail('maya.orianne@gmail.com');
            $manager->persist($user);
            
            
            $manager->flush();
        }
        

        
    
}
