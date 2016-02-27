<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use UserBundle\Entity\User;
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
        $form = $this->createForm(UserType::class,new User);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){

        }

        return $this->render('@User/User/new.html.twig',['form'=>$form->createView()]);
    }

}
