<?php

namespace App\DataFixtures;

use App\Entity\Band;
use App\Entity\BandMember;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        
        $customer1 = new User();
        $customer1.setName("John");
        $customer1.setEmail("John@gmail.com");
        $customer1.setPassword("password");
        $customer1.setRole("customer");

        $band1 = new Band();
        $band1->setName("The wedding singers");
        $band1->setGenre("pop");

        $bm1 = new BandMember();
        $bm1->setFirstName("Bob");
        $bm1->setLastName("evans");
        $bm1->setEmail("bob@gmail.com");
        $bm1->setPassword("bob");
        $bm1->setBandRole("Singer");
        $bm1->setBand($band1);

        $bm2 = new BandMember();
        $bm2->setFirstName("Tom");
        $bm2->setLastName("evans");
        $bm2->setEmail("tom@gmail.com");
        $bm2->setPassword("tom");
        $bm2->setBandRole("Singer");
        $bm2->setBand($band1);

        $manager->persist($band1);
        $manager->persist($bm1);
        $manager->persist($bm2);
        $manager->persist($customer1);
        $manager->flush();
    }
}
