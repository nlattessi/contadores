<?php

namespace ContadoresBundle\Controller;

use ContadoresBundle\Form\TareaContadorFilterType;
use ContadoresBundle\Form\TareaFilterType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use ContadoresBundle\Utils\TwitterBootstrapViewCustom;

use ContadoresBundle\Entity\Contador;
use ContadoresBundle\Form\ContadorType;
use ContadoresBundle\Form\ContadorFilterType;

/**
 * Contador controller.
 *
 */
class ContadorController extends Controller
{
    /**
     * Lists all Contador entities.
     *
     */
    public function indexAction()
    {
        list($filterForm, $queryBuilder) = $this->filter();

        list($entities, $pagerHtml) = $this->paginator($queryBuilder);

        return $this->render('ContadoresBundle:Contador:index.html.twig', array(
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
        $filterForm = $this->createForm(new ContadorFilterType());
        $em = $this->getDoctrine()->getManager();
        $queryBuilder = $em->getRepository('ContadoresBundle:Contador')->createQueryBuilder('e');

        // Reset filter
        if ($request->get('filter_action') == 'reset') {
            $session->remove('ContadorControllerFilter');
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
                $session->set('ContadorControllerFilter', $filterData);
            }
        } else {
            // Get filter from session
            if ($session->has('ContadorControllerFilter')) {
                $filterData = $session->get('ContadorControllerFilter');
                $filterForm = $this->createForm(new ContadorFilterType(), $filterData);
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
            return $me->generateUrl('contador', array('page' => $page));
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
     * Creates a new Contador entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Contador();
        $form = $this->createForm(new ContadorType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $entity->getUsuario()->setEntidadId($entity->getId());
            $em->persist($entity->getUsuario());
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.create.success');

            return $this->redirect($this->generateUrl('contador_show', array('id' => $entity->getId())));
        }

        return $this->render('ContadoresBundle:Contador:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Contador entity.
     *
     */
    public function newAction()
    {
        $entity = new Contador();
        $form   = $this->createForm(new ContadorType(), $entity);

        return $this->render('ContadoresBundle:Contador:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Contador entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContadoresBundle:Contador')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contador entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
       // $tareas = $this->obtenerTareasPorContador($id,null,false);


        return $this->render('ContadoresBundle:Contador:show.html.twig', array(
            'entity'      => $entity,
            //'tareas' => $tareas ,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Contador entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContadoresBundle:Contador')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contador entity.');
        }

        $editForm = $this->createForm(new ContadorType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ContadoresBundle:Contador:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Contador entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContadoresBundle:Contador')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contador entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ContadorType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $entity->getUsuario()->setEntidadId($entity->getId());
            $em->persist($entity->getUsuario());
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.update.success');

            return $this->redirect($this->generateUrl('contador_edit', array('id' => $id)));
        } else {
            $this->get('session')->getFlashBag()->add('error', 'flash.update.error');
        }

        return $this->render('ContadoresBundle:Contador:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Contador entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ContadoresBundle:Contador')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Contador entity.');
            }

            $em->remove($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.delete.success');
        } else {
            $this->get('session')->getFlashBag()->add('error', 'flash.delete.error');
        }

        return $this->redirect($this->generateUrl('contador'));
    }

    /**
     * Creates a form to delete a Contador entity by id.
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
   /*
    * $pendientes en true trae SOLO las pendientes
    * */
    private function obtenerTareasPorContador($id, $filterForm, $pendientes)
    {
        $tareasService =  $this->get('contadores.servicios.tareas');

        $tareas = $tareasService->obtenerTareasPorContador($id,$filterForm,
            $this->get('lexik_form_filter.query_builder_updater'),$pendientes  );
        return $tareas;
    }

    public function tareasTodasAction(Request $request)
    {
        $filterForm = $this->createForm(new TareaContadorFilterType());
        if ($request->get('filter_action') == 'filter') {
            $filterForm->bind($request);
            $tareas = $this->obtenerTareasPorContador($this->getUser()->getEntidadId(), $filterForm, false);
        }else{
            $tareas = $this->obtenerTareasPorContador($this->getUser()->getEntidadId(), null, false);
        }

        return $this->render('ContadoresBundle:Contador:todasmistareas.html.twig', array(
            'tareas' => $tareas,
            'filterForm' => $filterForm->createView()
        ));
    }

    public function tareasPendientesAction(Request $request)
    {
        $filterForm = $this->createForm(new TareaContadorFilterType());
        if ($request->get('filter_action') == 'filter') {
            $filterForm->bind($request);
            $tareas = $this->obtenerTareasPorContador($this->getUser()->getEntidadId(), $filterForm, true);
        }else{
            $tareas = $this->obtenerTareasPorContador($this->getUser()->getEntidadId(), null, true);
        }
        return $this->render('ContadoresBundle:Contador:tareaspendientes.html.twig', array(
            'tareas' => $tareas,
            'filterForm'=> $filterForm->createView()
        ));
    }
}
