<?php

namespace App\DataFixtures;

use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
   /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    
    public function load(ObjectManager $manager): void
    {
        $user1 = new Utilisateur();
        $user1->setEmail('jade.gurnaud@gmail.com');
        $user1->setPassword($this->encoder->encodePassword($user1,'motdepasse'));
        $user1->setRoles((array)'ROLE_ADMIN');
        $user1->setFirstname('Jade');
        $user1->setLastname('Gurnaud');
        $manager->persist($user1);
        $manager->flush();
    }
}
