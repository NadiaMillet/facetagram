<?php
// src/Controller/FaceController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FaceController extends AbstractController
{
/**
* @Route("/home", name="home")
*/
    public function affiche()
    {
        return $this->render('home.html.twig');
    }

    /**
    * @Route("/about", name="a_propos")
    */
        public function about()
        {
            return $this->render('about.html.twig');
        }

    /**
    * @Route("/products", name="products")
    */
        public function products()
        {
            return $this->render('products.html.twig');
        }


    /**
    * @Route("/services", name="services")
    */
        public function services()
        {
            return $this->render('services.html.twig');
        }
}