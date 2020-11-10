<?php

namespace App\DataFixtures;

use App\Entity\Classe;
use App\Entity\Profil;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpKernel\EventListener\ProfilerListener;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    public function load(ObjectManager $manager)
    {

        // $profiler= new Profil();
        // $profiler->setLibelle("user");
        // $profiler2= new Profil();
        // $profiler2->setLibelle("admin");

        // $classroom = new Classe();
        // $classroom->setClasseName("CE2");
        // $classroom2 = new Classe();
        // $classroom2->setClasseName("CM1");
        //  $classroom3 = new Classe();
        // $classroom3->setClasseName("CM2");




        $user= new User();
       // $classe = new Classe();
       // $classe->setClasseName(3);

       // $profil = new Profil();
      //  $profil->setLibelle(1);

      

        // $profil1 = new Profil();
        // $profil1->setLibelle(2);


        $user->setPrenom("El Hadji Yaya");
        $user->setNom("LY");
        $user->setUsername("yalya");
        $user->setRoles(["ROLE_ADMIN"]); 
        // $user->setProfil($profil1);

        $password = $this->encoder->encodePassword($user, 'welcome');
        $user->setPassword($password);

        $user1= new User();
        $user1->setPrenom("Cherif");
        $user1->setNom("NDIAYE");
        $user1->setUsername("cherif");
        $password = $this->encoder->encodePassword($user1, 'welcome');
        $user1->setPassword($password);
        $user1->setRoles(["ROLE_USER"]);
        $user1->setStatut("debloquer");
  

        $manager->persist($user);
        $manager->persist($user1);


        $manager->flush();


      
    }
}
