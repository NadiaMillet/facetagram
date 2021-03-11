<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ProductType;
use App\Entity\Product;

class ProductController extends AbstractController
{
    /**
     * @Route("/product/new", name="new_product")
     */
    public function new(Request $request)
    {
        $product = new Product();

        $form = $this->createForm(ProductType::class , $product);

               
       $form->handleRequest($request);

       if ($form->isSubmitted() && $form->isValid()) 
       {
           dump($product);
       }
    
        return $this->render('newproduct.html.twig' , ['formulaireNewProduct' => $form->createView()]);

    }
}