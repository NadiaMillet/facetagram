<?php
// src/Controller/MatiereController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\MatiereType;
use App\Entity\Matiere;

class  MatiereController extends AbstractController
{
    /**
     * @Route("/matiere/new", name="matiere")
     */
    public function new(Request $request)
    {
        $matiere = new Matiere();
        $form = $this->createForm(MatiereType::class , $matiere);

               
       $form->handleRequest($request);

       if ($form->isSubmitted() && $form->isValid()) 
       {
           dump($matiere);
           // va recup la class dictrine -> va recuperer la class manager de données
           $em = $this->getDoctrine()->getManager();
           // em = objet intancier de la class manager (entity manager)
           // persist() = Cette méthode signale à Doctrine que l'objet doit être enregistré. Elle ne doit être utilisée que pour un nouvel objet et non pas pour une mise à jour.alors jutilise la methode persistante=persist pour rendre ($matiere) persistant 
            $em->persist($matiere);
            // flush() = éxécute le SQL dans la base.
            $em->flush();

       }
    
        return $this->render('/matiere/new.html.twig' , ['formMatiere' => $form->createView()]);

    }

    
    // /**
    //  * @Route("/matiere/edit/{id<\d+>}")
    //  */
    // public function edit(Request $request, Matiere $matiere)
    // {
    //     $form = $this->createForm(MatiereType::class, $matiere);

    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         // va effectuer la requête d'UPDATE en base de données
    //         $this->getDoctrine()->getManager()->flush();
    //     }

    //     return $this->render('/matiere/new.html.twig', ['formMatiere'=>$form->createView()]);
    // }
}