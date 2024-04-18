<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function __construct(
        private readonly UserPasswordHasherInterface $passwordHasher
    )
    {
    }

    public function load(EntityManagerInterface|ObjectManager $manager): void
    {
        $user = new User();
        $user->setName('Luke');
        $user->setLastName('Skywalker');
        $user->setEmail('test@myApp.com');
        $user->setRoles(['ROLE_USER']);
        $user->setPassword($this->passwordHasher->hashPassword($user, '12345678'));

        $manager->persist($user);
        $manager->flush();
    }
}
