<?php

namespace App\Controller;

use App\Entity\Voiture;
use App\Entity\Chauffeur;
use App\Form\VoitureType;
use App\Repository\VoitureRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class VoitureController extends AbstractController
{
    #[Route('/voiture', name: 'voiture')]
    public function index(VoitureRepository $voitureRepository): Response
    {
        $liste = $voitureRepository-> findAll();

        return $this->render('voiture/index.html.twig', [
            'liste' => $liste
        ]);
    }


/**
 * @route("/voiture/create" , name = "creation_voiture")
 */
 
 public function create( Request $request): Response{
     $voiture = new Voiture();

     $form = $this->createForm(VoitureType::class, $voiture);

    //executer la reque de l'utilisateur
    $form->handleRequest($request);

    if($form->isSubmitted()&&$form->isValid()){
     
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($voiture);
        $entityManager-> flush();

        Return $this->redirectToRoute('voiture');
    }

    return $this->render ("voiture/create.html.twig",[
        'formulaire'=> $form->createView()
        ]);
 }

    
/**
 * @route("/{id}/update" , name = "update")
 */


public function update(Request $request , $id) 
{

   $voiture = $this->getDoctrine()->getRepository(Voiture::class)->find($id);
   
   $form = $this->createForm(VoitureType::class, $voiture);

   //executer la requete de l'utilisateur
   $form->handleRequest($request);
   if($form->isSubmitted() && $form->isValid()){

       //On va utilser doctrine pour enregister notre voiture
       $entityManager = $this->getDoctrine()->getManager();
       $entityManager->persist($voiture);
       $entityManager->flush();

       return  $this->redirectToRoute('voiture');
   }
   
   
   return $this->render ("voiture/update.html.twig",[
       'formulaire'=> $form->createView()
       ]);

   }
   #[Route('/{id}', name: 'delete')]

   public function delete($id){
       $voiture = $this->getDoctrine()->getRepository(Voiture::class)->find($id);
       $entityManager = $this->getDoctrine()->getManager();
       $entityManager->remove($voiture);
       $entityManager->flush();

       return  $this->redirectToRoute('voiture');
   }   


}
