<?php
// src/Controller/ProfController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ProfType;
use App\Entity\Prof;

class  ProfController extends AbstractController
{
    /**
     * @Route("/prof/new", name="prof")
     */
    public function new(Request $request)
    {
        $prof = new Prof();
        $form = $this->createForm(ProfType::class , $prof);

               
       $form->handleRequest($request);

       if ($form->isSubmitted() && $form->isValid()) 
       {
           dump($prof);
           // va recup la class dictrine -> va recuperer la class manager de données
           $em = $this->getDoctrine()->getManager();
           // em = objet intancier de la class manager (entity manager)
           // persist() = Cette méthode signale à Doctrine que l'objet doit être enregistré. Elle ne doit être utilisée que pour un nouvel objet et non pas pour une mise à jour.alors jutilise la methode persistante=persist pour rendre ($prof) persistant 
            $em->persist($prof);
            // flush() = éxécute le SQL dans la base.
            $em->flush();

       }
    
        return $this->render('/prof/new.html.twig' , ['formProf' => $form->createView()]);

    }
}