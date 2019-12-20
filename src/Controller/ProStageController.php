<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Entreprise ;
use App\Entity\Formation;
use App\Entity\Stage ;
class ProStageController extends AbstractController
{
   
    public function index()
    {
        //Récupérer le repository de l'entité Stage
        $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);
        
        // Récupérer les stages enregistrés en BD
        $stages = $repositoryStage->findall() ;

        //Envoyer les stages à la vue chargée de les récupérer

        return $this->render('pro_stage/index.html.twig', [
            'controller_name' => 'ProStageController', 'stages' => $stages
        ]);
    }

    public function afficherEntreprises()
    {
        return $this->render('pro_stage/afficherEntreprises.html.twig', [
            'controller_name' => 'ProStageController',
        ]);
    }

    public function afficherFormations()
    {
        return $this->render('pro_stage/afficherFormations.html.twig', [
            'controller_name' => 'ProStageController',
        ]);
    }

    public function afficherStages($id)
    {
        return $this->render('pro_stage/afficherStages.html.twig',['id' => $id ]);
    }
}

