<?php

namespace App\DataFixtures;

use App\Entity\Area;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }





    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setPassword($this->encoder->encodePassword($user, "dgsdg"));
        $user->setEmail("user@fixture");
        $user->setRoles(["ROLE_USER"]);
        $manager->persist($user);

        $admin = new User();
        $admin->setPassword($this->encoder->encodePassword($admin, "dgsdg"));
        $admin->setEmail("admin@fixture");
        $admin->setRoles(["ROLE_ADMIN"]);
        $manager->persist($admin);

        $area1 = new Area();
        $area1->setName("area1");
        $area1->setAdress("adresse");
        $area1->setPostalCode(1111);
        $area1->setDecription("blabla");
        $area1->setbaby("oui");
        $area1->setAge2("oui");
        $area1->setAge3("oui");
        $area1->setjunior("oui");
        $area1->setPmr("oui");
        $area1->setRestaurant("oui");
        $area1->setPicnic("non");
        $area1->setOtherActivites("non");
        $area1->setWebsite("website@internet.be");
        $area1->setAccess("gratuit");
        $area1->setParking("oui");
        $manager->persist($area1);


        $area2 = new Area();
        $area2->setName("area2");
        $area2->setAdress("adresse");
        $area2->setPostalCode(1111);
        $area2->setDecription("bloublou");
        $area1->setbaby("oui");
        $area1->setmini("oui");
        $area1->setchild("oui");
        $area1->setjunior("oui");
        $area2->setPmr("oui");
        $area2->setRestaurant("oui");
        $area2->setPicnic("non");
        $area2->setOtherActivites("non");
        $area2->setWebsite("website@internet.be");
        $area2->setAccess("gratuit");
        $area2->setParking("oui");
        $manager->persist($area2);


        $manager->flush();

    }
}