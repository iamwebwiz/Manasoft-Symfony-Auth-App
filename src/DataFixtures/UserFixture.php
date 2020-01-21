<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixture extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface $userPasswordEncoder
     */
    private $userPasswordEncoder;

    /**
     * UserFixture constructor.
     * @param UserPasswordEncoderInterface $userPasswordEncoder
     */
    public function __construct(UserPasswordEncoderInterface $userPasswordEncoder)
    {
        $this->userPasswordEncoder = $userPasswordEncoder;
    }

    /**
     * @param ObjectManager $manager
     * @throws \Exception
     */
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('ezekiel@manasoft.fr');
        $user->setFirstName('Ezekiel');
        $user->setLastName('Oladejo');
        $user->setBirthDate(new \DateTime('1997-02-07'));
        $user->setCreatedAt(new \DateTime());
        $user->setUpdatedAt(new \DateTime());
        $user->setPassword($this->userPasswordEncoder->encodePassword($user, 'password'));

        $manager->persist($user);
        $manager->flush();
    }
}
