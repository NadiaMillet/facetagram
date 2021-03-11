<?php
// src/Controller/FormController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ContactType;
use App\Entity\Contact;

class FormController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function new(Request $request)
    {
        $contact = new Contact();
        $contact->setNom('Millet');
        $contact->setPrenom('Nadia');
        $form = $this->createForm(ContactType::class , $contact);

               
       $form->handleRequest($request);

       if ($form->isSubmitted() && $form->isValid()) 
       {
           dump($contact);
           // va recup la class dictrine -> va recuperer la class manager de données
           $em = $this->getDoctrine()->getManager();
           // em = objet intancier de la class manager (entity manager)
           // persist() = Cette méthode signale à Doctrine que l'objet doit être enregistré. Elle ne doit être utilisée que pour un nouvel objet et non pas pour une mise à jour.alors jutilise la methode persistante=persist pour rendre ($contact) persistant 
            $em->persist($contact);
            // flush() = éxécute le SQL dans la base.
            $em->flush();

       }
    
        return $this->render('contact.html.twig' , ['monFormulaire' => $form->createView()]);

    }


    /**
     * @Route("/contact/edit/{id<\d+>}")
     */
    public function edit(Request $request, Contact $contact)
    {
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // va effectuer la requête d'UPDATE en base de données
            $this->getDoctrine()->getManager()->flush();
        }

        return $this->render('contact.html.twig', ['monFormulaire'=>$form->createView()]);
    }

    /**
     * @Route("/contact/delete/{id<\d+>}")
     */
    public function delete(Request $request, Contact $contact)
    {
        $em = $this->getDoctrine()->getManager();
        
        $em->remove($contact);
        $em->flush();

        // redirige la page
        return $this->redirectToRoute('home');
    }

    /**
     * @Route("/contactlist", name="contactlist" )
     */
    public function show(Request $request)
    {
        // $repository = variable par défaut symfony visant la class voulu
        // get Repository va aller au niveau des données dans la table précisée
        // SELECT query
        $repository = $this->getDoctrine()->getRepository(Contact::class);
        // a ce stade il a accès au données
        // je veux stocker dans la variable $contacts TOUT mes contacts
        $contacts = $repository->findAll();
        // entre guillmet c'est le nom utilisé sur Twig
    return $this->render('contactlist.html.twig', ['contacts'=>$contacts]);
    }




}