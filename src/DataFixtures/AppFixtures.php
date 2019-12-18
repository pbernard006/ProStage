<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Entreprise ;
use App\Entity\Formation;
use App\Entity\Stage ;
class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR'); // create a French faker

        $nbDonnees = 10 ;

        //tableau des formations
        $tabFormation = array(
            "DUT" => "Diplôme universitaire de technologie",
            "BTS" => "Brevet de technicien supérieur",
            "CAP" => "Certificat d'aptitude professionnelle",
            "Ecole ingé" => "Ecole d'ingénieur",
            "LP" => "Licence professionnelle"
        );

        foreach($tabFormation as $leNomCourt => $leNomLong)
        {
            $formation = new Formation();
            $formation->setNomLong($leNomLong);
            $formation->setNomCourt($leNomCourt);
            $manager->persist($formation);
        }

        for ($i=0; $i < $nbDonnees; $i++)
        {
            $entreprise = new Entreprise();
            $entreprise->setNom($faker->company);
            $entreprise->setActivite($faker->catchPhrase);
            $entreprise->setAdresse($faker->city);
            $entreprise->setSiteWeb($faker->safeEmailDomain);
    
            $manager->persist($entreprise);

           

            $stage = new Stage();
            $stage->setTitre($faker->jobTitle);
            $stage->setDescription($faker->sentence($nbWords = 15, $variableNbWords = true));
            $stage->setEmail($faker->email);
            $stage->addLaFormation($formation);
            
            $manager->persist($stage);

        } 



     
        
       

        $manager->flush();
    }
}
