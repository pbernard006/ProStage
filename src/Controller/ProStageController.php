<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProStageController extends AbstractController
{
   
    public function index()
    {
        return $this->render('pro_stage/index.html.twig', [
            'controller_name' => 'ProStageController',
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

