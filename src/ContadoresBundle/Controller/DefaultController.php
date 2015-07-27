<?php

namespace ContadoresBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ContadoresBundle:Default:index.html.twig', array('name' => $name));
    }

    public function unauthorizedAction()
    {
        return $this->render('ContadoresBundle:Default:unauthorized.html.twig');
    }
}
