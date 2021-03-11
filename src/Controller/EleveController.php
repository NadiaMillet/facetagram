<?php
// src/Controller/EleveController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\EleveType;
use App\Entity\Eleve;

class  EleveController extends AbstractController
{
    /**
     * @Route("/eleve/new", name="eleve")
     */
    public function new(Request $request)
    {
        $eleve = new Eleve();
        $form = $this->createForm(EleveType::class , $eleve);

               
       $form->handleRequest($request);

       if ($form->isSubmitted() && $form->isValid()) 
       {
           dump($eleve);
           // va recup la class dictrine -> va recuperer la class manager de données
           $em = $this->getDoctrine()->getManager();
           // em = objet intancier de la class manager (entity manager)
           // persist() = Cette méthode signale à Doctrine que l'objet doit être enregistré. Elle ne doit être utilisée que pour un nouvel objet et non pas pour une mise à jour.alors jutilise la methode persistante=persist pour rendre ($eleve) persistant 
            $em->persist($eleve);
            // flush() = éxécute le SQL dans la base.
            $em->flush();

       }
    
        return $this->render('/eleve/new.html.twig' , ['formEleve' => $form->createView()]);

    }
}