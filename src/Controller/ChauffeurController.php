<?php

namespace App\Controller;

use App\Entity\Chauffeur;
use App\Form\ChauffeurType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ChauffeurController extends AbstractController
{
    #[Route('/chauffeur', name: 'chauffeur')]
    public function index(): Response
    {
        return $this->render('chauffeur/index.html.twig', [
            'controller_name' => 'ChauffeurController',
        ]);
    }

    #[Route('/chauffeur', name:'chauffeur')]
    public function create(Request $request): Response
    {

        $tache = new Chauffeur();
        $form = $this->createform(ChauffeurType::class, $tache);

        if($form->isSubmitted() && $form->isValid()){
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tache);
            $entityManager->flush();
        }
        return $this->render('chauffeur/chauffeur.html.twig', [
            "titre" => "Veuillez Remplir le formulaire",
            "form" => $form->createView(),
        ]);
    }
}
