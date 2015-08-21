<?php

namespace ContadoresBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->redirect($this->generateUrl('login'));
    }

    public function unauthorizedAction()
    {
        return $this->render('ContadoresBundle:Default:unauthorized.html.twig');
    }
}
