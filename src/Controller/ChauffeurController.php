<?php

namespace App\Controller;

use App\Entity\Chauffeur;
use App\Form\ChauffeurType;
use App\Repository\ChauffeurRepository;
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

    #[Route('/Chauffeur/client', name:'chauffeur_liste')]
    public function client()
    {
        $tache = $this->getDoctrine()->getRepository(Chauffeur::class)->findAll();

        return $this->render('Chauffeur/client.html.twig', [
            "Liste" => $tache,
        ]);
    }
    

    #[Route('/Chauffeur', name:'chauffeur')]
    public function create(Request $request): Response
{
    $chauffeur = new Chauffeur();
    $form = $this->createForm(ChauffeurType::class, $chauffeur);
    $form->handleRequest($request);

    if($form->isSubmitted() && $form->isValid())
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($chauffeur);
        $entityManager->flush();
    }

    return $this->render("Chauffeur/chauffeur.html.twig", [
        "form_title" => "S'inscrire",
        "form" => $form->createView(),
    ]);
}
}
