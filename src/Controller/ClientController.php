<?php
// src/Controller/FormController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ClientType;
use App\Entity\Client;

class ClientController extends AbstractController
{
    /**
     * @Route("/client/new", name="client_new")
     */
    public function new(Request $request)
    //// La classe Request permet de centraliser l'accès à toutes les super variables de PHP en une seule classe utilitaire.
    //// Récupération des valeurs accessibles dans les super variables

    {
        $client = new Client();
        $form = $this->createForm(ClientType::class , $client);

               
       $form->handleRequest($request);

       if ($form->isSubmitted() && $form->isValid()) 
       {
           dump($client);
       }
    
        return $this->render('newclient.html.twig' , ['formulaireNewClient' => $form->createView()]);

    }
}