<?php

namespace UserBundle\Controller;

use ProductBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use UserBundle\Entity\User;
use UserBundle\Form\ProductType;
use UserBundle\Form\UserType;

class UserController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository('UserBundle:User')->findAll();

        return $this->render('@User/User/index.html.twig', array(
            'users' => $users,
        ));
    }

    public function newAction(Request $request)
    {
//        to see product in new user form you need to add at least one product here to text - if its not adding dinamicly
        $user =new User;
        $product = new Product();
        $product->setName('productttt');
        $product->setPrice(21123123);

        $user->addProduct($product);

        $form = $this->createForm(UserType::class,$user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($form->getData());
            $em->flush();

            return $this->redirectToRoute('user_homepage');
        }

        return $this->render('@User/User/new.html.twig',['form'=>$form->createView()]);
    }

}
