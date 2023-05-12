<?php

namespace App\DataFixtures;

use App\Entity\Band;
use App\Entity\BandMember;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

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


        $s1 = new Song();
        $s1->setName("Wedding song");

<<<<<<< Updated upstream
        $manager->persist($band1);
        $manager->persist($bm1);
        $manager->persist($bm2);
        $manager->flush();
    }
=======
                $bm2 = new BandMember();
                $bm2->setFirstName("Tom");
                $bm2->setLastName("evans");
                $bm2->setEmail("tom@gmail.com");
                $bm2->setPassword("tom");
                $bm2->setBandRole("Singer");
                //        $bm2->setBand($band1);

                // $product = new Product();
                // $manager->persist($product);

                $band1 = new Band();
                $band1->setName("The wedding singers");
                $band1->setGenre("pop");
                $band1->setEmail("TheWeddingSingers@gmail.com");
                $pass = "pass";
                $encodedPassword = $this->passwordHasher->hashPassword($band1, $pass);

                $band1->setPassword($encodedPassword);
                $band1->setBandMembers($bm1->getFirstName() . " " . $bm1->getLastName() . ", " . $bm2->getFirstName() . " " . $bm2->getLastName());

                $user1 = new User();
                $user1->setName("Test User");
                $user1->setEmail("user@gmail.com");
                $passUser = "pass";
                $encodedPasswordUser = $this->passwordHasher->hashPassword($user1, $passUser);

                $user1->setPassword($encodedPasswordUser);


                $user1->setRole("ROLE_CUSTOMER");

                $manager1 = new Manager();
                $manager1->setFirstName("Test manager");
                $manager1->setEmail("user@gmail.com");
                $passManager = "pass";
                $encodedPasswordUser = $this->passwordHasher->hashPassword($manager1, $passManager);

                $manager1->setPassword($encodedPasswordUser);


                $manager1->setRole("ROLE_MANAGER");


                $manager->persist($band1);
                $manager->persist($bm1);
                $manager->persist($bm2);

                $manager->persist($customer1);

                $manager->persist($user1);

                $manager->flush();
        }
>>>>>>> Stashed changes
}
