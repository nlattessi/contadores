<?php

namespace ContadoresBundle\Controller;

use ContadoresBundle\Entity\Observacion;
use ContadoresBundle\Entity\Rol;
use ContadoresBundle\Utils\TwitterBootstrapViewCustom;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\DoctrineORMAdapter;

use ContadoresBundle\Entity\Tarea;
use ContadoresBundle\Form\TareaType;
use ContadoresBundle\Form\TareaFilterType;

/**
 * Tarea controller.
 *
 */
class TareaController extends Controller
{
    /**
     * Lists all Tarea entities.
     *
     */
    public function indexAction()
    {
        list($filterForm, $queryBuilder) = $this->filter();

        list($entities, $pagerHtml) = $this->paginator($queryBuilder);

        return $this->render('ContadoresBundle:Tarea:index.html.twig', array(
            'entities' => $entities,
            'pagerHtml' => $pagerHtml,
            'filterForm' => $filterForm->createView(),
        ));
    }

    /**
    * Create filter form and process filter request.
    *
    */
    protected function filter()
    {
        $request = $this->getRequest();
        $session = $request->getSession();
        $usuario = $this->getUser();
        $filtroService =  $this->get('contadores.servicios.filtro');
        $filterForm = $this->createForm(new TareaFilterType($filtroService));
        $em = $this->getDoctrine()->getManager();
        if($usuario->getRol() == Rol::$contador) {
            $contador = $em->getRepository('ContadoresBundle:Contador')->find($usuario->getEntidadId());
            if ($contador) {
            $queryBuilder = $em->getRepository('ContadoresBundle:Tarea')->createQueryBuilder('e')
                ->where('e.contador = ?1')
                ->setParameter(1, $contador->getId());
            }else{
                //TODO: manejo de error
            }
        }else{
            $queryBuilder = $em->getRepository('ContadoresBundle:Tarea')->createQueryBuilder('e');
        }


        // Reset filter
        if ($request->get('filter_action') == 'reset') {
            $session->remove('TareaControllerFilter');
        }

        // Filter action
        if ($request->get('filter_action') == 'filter') {
            // Bind values from the request
            $filterForm->bind($request);

            if ($filterForm->isValid()) {
                // Build the query from the given form object
                $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($filterForm, $queryBuilder);
                // Save filter to session
                $filterData = $filterForm->getData();
                $session->set('TareaControllerFilter', $filterData);
            }
        } else {
            // Get filter from session
            if ($session->has('TareaControllerFilter')) {
                $filterData = $session->get('TareaControllerFilter');
                $filtroService =  $this->get('contadores.servicios.filtro');
                $filterForm = $this->createForm(new TareaFilterType($filtroService), $filterData);
                $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($filterForm, $queryBuilder);
            }
        }

        return array($filterForm, $queryBuilder);
    }

    /**
    * Get results from paginator and get paginator view.
    *
    */
    protected function paginator($queryBuilder)
    {
        // Paginator
        $adapter = new DoctrineORMAdapter($queryBuilder);
        $pagerfanta = new Pagerfanta($adapter);
        $currentPage = $this->getRequest()->get('page', 1);
        $pagerfanta->setCurrentPage($currentPage);
        $entities = $pagerfanta->getCurrentPageResults();

        // Paginator - route generator
        $me = $this;
        $routeGenerator = function($page) use ($me)
        {
            return $me->generateUrl('tarea', array('page' => $page));
        };

        // Paginator - view
        $translator = $this->get('translator');
        $view = new TwitterBootstrapViewCustom();
        $pagerHtml = $view->render($pagerfanta, $routeGenerator, array(
            'proximity' => 3,
            'prev_message' => $translator->trans('views.index.pagprev', array(), 'JordiLlonchCrudGeneratorBundle'),
            'next_message' => $translator->trans('views.index.pagnext', array(), 'JordiLlonchCrudGeneratorBundle'),
        ));

        return array($entities, $pagerHtml);
    }

    /**
     * Creates a new Tarea entity.
     *
     */
    public function createAction(Request $request)
    {
        $usuarioService =  $this->get('contadores.servicios.usuario');
        $entity  = new Tarea();
        $tareasService =  $this->get('contadores.servicios.tareas');
        $vencimientoService =  $this->get('contadores.servicios.vencimiento');
        $form   = $this->createForm(new TareaType($tareasService,$vencimientoService), $entity, array(
            'user' => $this->getUser(),
            'periodica' => false
        ));
        $form->bind($request);

        if ($form->isValid()) {
            if ($this->getUser()->getRol() == Rol::$contador ){
                $contador = $usuarioService->obtenerContadorPorUsuario($this->getUser());
                $entity->setContador($contador);
            }

            if(strlen($entity->getNombre()) < 1){

                $entity->setNombre($entity->getTareaMetadata()->getNombre() . ' ' . $entity->getCliente()->getNombre());
            }
            $entity->setFechaCreacion(new \DateTime(null));

            if ($form->has('vencimientoInterno') && $form->get('vencimientoInterno')->getData() !== null) {
                $vencimientoInterno = $form->get('vencimientoInterno')->getData();
                $dtVencimientoInterno = \DateTime::createFromFormat('d/m/Y', $vencimientoInterno);
                $entity->setVencimientoInterno($dtVencimientoInterno);
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();


            $tiempo = $request->get('tiempoReal');
            $tareasService =  $this->get('contadores.servicios.tareas');
            if($request->get('finalizada')){
                $estado = $tareasService->crearEstadoTareaFinalizado($entity, $tiempo);
            }else{
                $estado = $tareasService->crearEstadoTareaNuevo($entity, $tiempo);
            }

            $entity->setEstadoActual($estado);
            $em->persist($entity);

            $observaciones = $request->get('observaciones');
            if($observaciones){
                $observacion = new Observacion($this->getUser(),$entity,$observaciones);
                $em->persist($observacion);
            }

            $em->flush();

            if (isset($request->files->get('archivos')[0])) {
                $archivoService = $this->get('contadores.servicios.archivo');
                foreach ($request->files->get('archivos') as $archivo) {
                    $archivoService->createArchivoTarea(
                        $archivo,
                        $this->getUser(),
                        $entity
                    );
                }
            }

            $this->get('session')->getFlashBag()->add('success', 'flash.create.success');

            return $this->redirect($this->generateUrl('tarea_show', array('id' => $entity->getId())));
        }

        return $this->render('ContadoresBundle:Tarea:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    public function createPeriodicaAction(Request $request)
    {
        $usuarioService =  $this->get('contadores.servicios.usuario');
        $entity  = new Tarea();
        $tareasService =  $this->get('contadores.servicios.tareas');
        $vencimientoService =  $this->get('contadores.servicios.vencimiento');
        $form   = $this->createForm(new TareaType($tareasService,$vencimientoService), $entity, array(
            'user' => $this->getUser(),
            'periodica' => true
        ));
        $form->bind($request);

        if ($form->isValid()) {
            if ($this->getUser()->getRol() == Rol::$contador ){
                $contador = $usuarioService->obtenerContadorPorUsuario($this->getUser());
                if(!$contador->getEsJefe()){
                    $entity->setContador($contador);
                }
            }

            if(strlen($entity->getNombre()) < 1){

                $entity->setNombre($entity->getTareaMetadata()->getNombre() . ' ' . $entity->getCliente()->getNombre());
            }
            $entity->setFechaCreacion(new \DateTime(null));

            if ($form->has('vencimientoInterno') && $form->get('vencimientoInterno')->getData() !== null) {
                $vencimientoInterno = $form->get('vencimientoInterno')->getData();
                $dtVencimientoInterno = \DateTime::createFromFormat('d/m/Y', $vencimientoInterno);
                $entity->setVencimientoInterno($dtVencimientoInterno);
            }

            if ($form->has('periodo') && $form->get('periodo')->getData() !== null) {
                $vencimientoFiscal = $vencimientoService->obtenerVencimientoFiscal($entity->getPeriodo(),$entity->getCliente());
                $entity->setVencimientoFiscal($vencimientoFiscal->getFecha());
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();


            $tiempo = $request->get('tiempoReal');
            $tareasService =  $this->get('contadores.servicios.tareas');
            if($request->get('finalizada')){
                $estado = $tareasService->crearEstadoTareaFinalizado($entity, $tiempo);
            }else{
                $estado = $tareasService->crearEstadoTareaNuevo($entity, $tiempo);
            }

            $entity->setEstadoActual($estado);
            $em->persist($entity);

            $observaciones = $request->get('observaciones');
            if($observaciones){
                $observacion = new Observacion($this->getUser(),$entity,$observaciones);
                $em->persist($observacion);
            }


            $em->flush();

            if (isset($request->files->get('archivos')[0])) {
                $archivoService = $this->get('contadores.servicios.archivo');
                foreach ($request->files->get('archivos') as $archivo) {
                    $archivoService->createArchivoTarea(
                        $archivo,
                        $this->getUser(),
                        $entity
                    );
                }
            }


            $this->get('session')->getFlashBag()->add('success', 'flash.create.success');

            return $this->redirect($this->generateUrl('tarea_show', array('id' => $entity->getId())));
        }

        return $this->render('ContadoresBundle:Tarea:newperiodica.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }


    public function createRealizadaAction(Request $request)
    {
        $usuarioService =  $this->get('contadores.servicios.usuario');
        $entity  = new Tarea();
        $tareasService =  $this->get('contadores.servicios.tareas');
        $vencimientoService =  $this->get('contadores.servicios.vencimiento');
        $form   = $this->createForm(new TareaType($tareasService,$vencimientoService), $entity, array(
            'user' => $this->getUser(),
            'periodica' => false
        ));
        $form->bind($request);

        if ($form->isValid()) {
            if ($this->getUser()->getRol() == Rol::$contador ){
                $contador = $usuarioService->obtenerContadorPorUsuario($this->getUser());
                if(!$contador->getEsJefe()){
                    $entity->setContador($contador);
                }
            }

            if(strlen($entity->getNombre()) < 1){

                $entity->setNombre($entity->getTareaMetadata()->getNombre() . ' ' . $entity->getCliente()->getNombre());
            }
            $entity->setFechaCreacion(new \DateTime(null));

            if ($form->has('fechaFin') && $form->get('fechaFin')->getData() !== null) {
                $fechaFin = $form->get('fechaFin')->getData();
                $fechaFin = \DateTime::createFromFormat('d/m/Y', $fechaFin);
                $entity->setFechaFin($fechaFin);
            }


            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();


            $tiempo = $request->get('tiempoReal');
            $tareasService =  $this->get('contadores.servicios.tareas');

           // $estado = $tareasService->crearEstadoTareaFinalizado($entity, $tiempo);
            $tareasService->finalizarTarea($entity, $tiempo);

            //$entity->setEstadoActual($estado);
            //$em->persist($entity);

            $observaciones = $request->get('observaciones');
            if($observaciones){
                $observacion = new Observacion($this->getUser(),$entity,$observaciones);
                $em->persist($observacion);
            }


            $em->flush();

            if (isset($request->files->get('archivos')[0])) {
                $archivoService = $this->get('contadores.servicios.archivo');
                foreach ($request->files->get('archivos') as $archivo) {
                    $archivoService->createArchivoTarea(
                        $archivo,
                        $this->getUser(),
                        $entity
                    );
                }
            }


            $this->get('session')->getFlashBag()->add('success', 'flash.create.success');

            return $this->redirect($this->generateUrl('tarea_show', array('id' => $entity->getId())));
        }

        return $this->render('ContadoresBundle:Tarea:newrealizada.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Tarea entity.
     *
     */
    public function newAction()
    {
        $entity = new Tarea();
        $tareasService =  $this->get('contadores.servicios.tareas');
        $vencimientoService =  $this->get('contadores.servicios.vencimiento');
        $form   = $this->createForm(new TareaType($tareasService,$vencimientoService), $entity, array(
            'user' => $this->getUser(),
            'periodica' => false
        ));

        return $this->render('ContadoresBundle:Tarea:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    public function newPeriodicaAction()
    {
        $entity = new Tarea();
        $tareasService =  $this->get('contadores.servicios.tareas');
        $vencimientoService =  $this->get('contadores.servicios.vencimiento');
        $form   = $this->createForm(new TareaType($tareasService,$vencimientoService), $entity, array(
            'user' => $this->getUser(),
            'periodica' => true
        ));

        return $this->render('ContadoresBundle:Tarea:newperiodica.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    public function realizadaAction()
    {
        $entity = new Tarea();
        $tareasService =  $this->get('contadores.servicios.tareas');
        $vencimientoService =  $this->get('contadores.servicios.vencimiento');
        $form   = $this->createForm(new TareaType($tareasService,$vencimientoService), $entity, array(
            'user' => $this->getUser(),
            'periodica' => false
        ));

        return $this->render('ContadoresBundle:Tarea:newrealizada.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Tarea entity.
     *
     */

    private function mostrar($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContadoresBundle:Tarea')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tarea entity.');
        }

        return $entity;
    }

    public function showAction(Request $request, $id)
    {
        if ($request->isMethod('POST')) {
            $entity = $this->mostrar($id);

            if (isset($request->files->get('archivos')[0])) {
                $archivoService = $this->get('contadores.servicios.archivo');
                foreach ($request->files->get('archivos') as $archivo) {
                    $archivoService->createArchivoTarea(
                        $archivo,
                        $this->getUser(),
                        $entity
                    );
                }
            }
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ContadoresBundle:Tarea:show.html.twig', array(
            'entity'      => $this->mostrar($id),
            'delete_form' => $deleteForm->createView(),        ));
    }

    public function showClienteAction($id)
    {
        return $this->render('ContadoresBundle:Tarea:showcliente.html.twig', array(
            'entity'      => $this->mostrar($id),));
    }

    public function showContadorAction($id)
    {
        return $this->render('ContadoresBundle:Tarea:showcontador.html.twig', array(
            'entity'      => $this->mostrar($id),));
    }

    /**
     * Displays a form to edit an existing Tarea entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContadoresBundle:Tarea')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tarea entity.');
        }

        $tareasService =  $this->get('contadores.servicios.tareas');
        $vencimientoService =  $this->get('contadores.servicios.vencimiento');
        $editForm   = $this->createForm(new TareaType($tareasService,$vencimientoService), $entity, array(
            'user' => $this->getUser(),
            'periodica' => false
        ));

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ContadoresBundle:Tarea:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Tarea entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContadoresBundle:Tarea')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tarea entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $tareasService =  $this->get('contadores.servicios.tareas');
        $vencimientoService =  $this->get('contadores.servicios.vencimiento');
        $editForm   = $this->createForm(new TareaType($tareasService,$vencimientoService), $entity, array(
            'user' => $this->getUser(),
            'periodica' => false
        ));
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $entity->setFechaCreacion(new \DateTime(null));
            $em->persist($entity);
            $em->flush();

            $estadoNuevo = $tareasService->crearEstadoTareaNuevo($entity);
            $entity->setEstadoActual($estadoNuevo);
            $em->persist($entity);
            $em->flush();

            if (isset($editForm['attachment']->getData()[0])) {
                $archivoService = $this->get('contadores.servicios.archivo');
                foreach ($editForm['attachment']->getData() as $archivo) {
                    $archivoService->createArchivoTarea(
                        $archivo,
                        $this->getUser(),
                        $entity
                    );
                }
            }

            $this->get('session')->getFlashBag()->add('success', 'flash.update.success');

            return $this->redirect($this->generateUrl('tarea_edit', array('id' => $id)));
        } else {
            $this->get('session')->getFlashBag()->add('error', 'flash.update.error');
        }

        return $this->render('ContadoresBundle:Tarea:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Tarea entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ContadoresBundle:Tarea')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tarea entity.');
            }

            $em->remove($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.delete.success');
        } else {
            $this->get('session')->getFlashBag()->add('error', 'flash.delete.error');
        }

        return $this->redirect($this->generateUrl('tarea'));
    }

    /**
     * Creates a form to delete a Tarea entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
