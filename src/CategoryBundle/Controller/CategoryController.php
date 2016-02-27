<?php

namespace CategoryBundle\Controller;

use CategoryBundle\Entity\Category;
use CategoryBundle\Form\CategoryType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CategoryController extends Controller
{
    public function indexAction()
    {
        return $this->render('CategoryBundle:Category:index.html.twig', array(
            // ...
        ));
    }

    public function newAction(Request $request)
    {
        $form = $this->createForm(CategoryType::class,new Category());
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($form->getData());
            $em->flush();

            return $this->redirectToRoute('category_homepage');
        }

        return $this->render('CategoryBundle:Category:new.html.twig', ['form'=>$form->createView()]);
    }

}
