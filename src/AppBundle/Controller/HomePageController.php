<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomePageController extends Controller
{
    public function indexAction()
    {
        return $this->render('AppBundle:HomePage:index.html.twig', array(
            // ...
        ));
    }

}
