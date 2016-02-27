<?php

namespace CategoryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategoryController extends Controller
{
    public function indexAction()
    {
        return $this->render('CategoryBundle:Category:index.html.twig', array(
            // ...
        ));
    }

    public function newAction()
    {
        return $this->render('CategoryBundle:Category:new.html.twig', array(
            // ...
        ));
    }

}
