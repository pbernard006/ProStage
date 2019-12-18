<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Entreprise ;
class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR'); // create a French faker

        $nbEntreprises = 10 ;

        for ($i=0; $i < $nbEntreprises; $i++)
        {
            $entreprise = new Entreprise();
            $entreprise->setNom($faker->company);
            $entreprise->setActivite($faker->catchPhrase);
            $entreprise->setAdresse($faker->city);
            $entreprise->setSiteWeb($faker->safeEmailDomain);
    
            
            
            $manager->persist($entreprise);
        } 

     
        
       

        $manager->flush();
    }
}
