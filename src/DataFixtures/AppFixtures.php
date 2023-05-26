<?php

namespace App\DataFixtures;

use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {
        $user = new Users;
        $user->setLastname("Dossou");
        $user->setFirstname("Ariel");
        $user->setEmail("arieldossou00@gmail.com");

        $password = $this->hasher->hashPassword($user, 'Ari_123');
        $user->setPassword($password);

        $manager->persist($user);
        $manager->flush();
    }
}
