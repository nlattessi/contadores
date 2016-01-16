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
        $tareasService =  $this->get('contadores.servicios.tareas');
        $clientesService =  $this->get('contadores.servicios.cliente');
        $vencimientosService =  $this->get('contadores.servicios.vencimiento');

        $tareas = $tareasService->obtenerTareasUrgentesPorUsuario($this->getUser());
        $clientes = $clientesService->obtenerClientesActivos();
        $vencimientos = $vencimientosService->obtenerProximosVencimientos();

        return $this->render('ContadoresBundle:Default:home.html.twig', array(
            'tareas'        => $tareas,
            'clientes' => $clientes,
            'vencimientos' => $vencimientos));
    }

    public function enConstruccionAction()
    {
        return $this->render('ContadoresBundle:Default:en_construccion.html.twig');
    }
}
