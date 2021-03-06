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
    #[Route('/chauffeurs', name: 'chauffeur')]
    public function index(chauffeurRepository $chauffeurRepository): Response
    {
        $liste = $chauffeurRepository-> findAll();

        return $this->render('chauffeur/index.html.twig', [
            'liste' => $liste
        ]);
    }



 #[Route('/chauffeurs/create', name:'creation_chauffeur')]
 public function create( Request $request): Response{
     $chauffeur = new Chauffeur();

     $form = $this->createForm(ChauffeurType::class, $chauffeur);

    
    $form->handleRequest($request);

    if($form->isSubmitted() && $form->isValid()){
     
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($chauffeur);
        $entityManager->flush();

        Return $this->redirectToRoute('chauffeur');
    }

    return $this->render ("chauffeur/create.html.twig",[
        'formulaire' => $form->createView()
        ]);
 }


#[Route('/chauffeurs/{id}/update', name:'update_chauffeur')]
public function update(Request $request , $id) 
{

   $chauffeur = $this->getDoctrine()->getRepository(Chauffeur::class)->find($id);
   
   $form = $this->createForm(ChauffeurType::class, $chauffeur);

   $form->handleRequest($request);

   if($form->isSubmitted() && $form->isValid()){

       $entityManager = $this->getDoctrine()->getManager();
       $entityManager->persist($chauffeur);
       $entityManager->flush();

       return  $this->redirectToRoute('chauffeur');
   }


   return $this->render ("chauffeur/update.html.twig",[
       'formulaire' => $form->createView()
       ]);

   }
   #[Route('chauffeur/{id}', name: 'delete_chauffeur')]

   public function delete($id){
       $chauffeur = $this->getDoctrine()->getRepository(Chauffeur::class)->find($id);
       $entityManager = $this->getDoctrine()->getManager();
       $entityManager->remove($chauffeur);
       $entityManager->flush();

       return  $this->redirectToRoute('chauffeur');
   }   


}
