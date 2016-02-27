<?php

namespace ProductBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductController extends Controller
{
    public function indexAction()
    {
        return $this->render('ProductBundle:Product:index.html.twig', array(
            // ...
        ));
    }

    public function newAction()
    {
        return $this->render('ProductBundle:Product:new.html.twig', array(
            // ...
        ));
    }

}
