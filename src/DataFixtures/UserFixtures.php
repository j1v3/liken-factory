<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        // $user = new User();
        // $user->setEmail("admin@likenfactory.com");
        // $user->setRoles(["ROLE_ADMIN"]);
        // $user->setPassword($this->passwordEncoder->encodePassword(
        // $user,
        // "admin"
        // ));
        // $manager->persist($user);
        
        // $user2 = new User();
        // $user2->setEmail("jeremy@likenfactory.com");
        // $user2->setRoles(["ROLE_USER"]);
        // $user2->setPassword($this->passwordEncoder->encodePassword(
        // $user2,
        // "jeremy"
        // ));
        // $manager->persist($user2);
        
        // $manager->flush();
    }
}
