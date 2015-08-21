<?php

namespace ContadoresBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->redirect($this->generateUrl('home'));
    }

    public function unauthorizedAction()
    {
        return $this->render('ContadoresBundle:Default:unauthorized.html.twig');
    }

    public function homeAction()
    {
        return $this->render('ContadoresBundle:Default:home.html.twig');
    }

    public function enConstruccionAction()
    {
        return $this->render('ContadoresBundle:Default:en_construccion.html.twig');
    }
}
