<?php

namespace ProductBundle\Controller;

use ProductBundle\Entity\Product;
use ProductBundle\Form\ProductType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProductController extends Controller
{
    public function indexAction()
    {
        return $this->render('ProductBundle:Product:index.html.twig', array(
            // ...
        ));
    }

    public function newAction(Request $request)
    {
        $form = $this->createForm(ProductType::class,new Product());
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($form->getData());
            $em->flush();

            return $this->redirectToRoute('product_homepage');
        }

        return $this->render('ProductBundle:Product:new.html.twig', ['form'=>$form->createView()]);
    }

}
