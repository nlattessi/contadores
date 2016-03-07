<?php

namespace ContadoresBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use ContadoresBundle\Utils\TwitterBootstrapViewCustom;

use ContadoresBundle\Entity\Vencimiento;
use ContadoresBundle\Form\VencimientoType;
use ContadoresBundle\Form\VencimientoFilterType;

/**
 * Vencimiento controller.
 *
 */
class VencimientoController extends Controller
{
    /**
     * Lists all Vencimiento entities.
     *
     */
    public function indexAction()
    {
        list($filterForm, $queryBuilder) = $this->filter();

        list($entities, $pagerHtml) = $this->paginator($queryBuilder);

        return $this->render('ContadoresBundle:Vencimiento:index.html.twig', array(
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

        $filtroService =  $this->get('contadores.servicios.filtro');
        $filterForm = $this->createForm(new VencimientoFilterType($filtroService));
        $em = $this->getDoctrine()->getManager();
        $queryBuilder = $em->getRepository('ContadoresBundle:Vencimiento')->createQueryBuilder('e');

        // Reset filter
        if ($request->get('filter_action') == 'reset') {
            $session->remove('VencimientoControllerFilter');
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
                $session->set('VencimientoControllerFilter', $filterData);
            }
        } else {
            // Get filter from session
            if ($session->has('VencimientoControllerFilter')) {
                $filterData = $session->get('VencimientoControllerFilter');

                $filtroService =  $this->get('contadores.servicios.filtro');
                $filterForm = $this->createForm(new VencimientoFilterType($filtroService), $filterData);
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
            return $me->generateUrl('vencimiento', array('page' => $page));
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
     * Creates a new Vencimiento entity.
     *
     */
    public function createAction(Request $request)
    {
        $vencimientoService =  $this->get('contadores.servicios.vencimiento');
        $entity  = new Vencimiento();
        $form = $this->createForm(new VencimientoType($vencimientoService), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            if ($form->has('fecha') && $form->get('fecha')->getData() !== null) {
                $fecha = $form->get('fecha')->getData();
                $dtFecha = \DateTime::createFromFormat('d/m/Y', $fecha);
                $entity->setFecha($dtFecha);
            }

            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.create.success');

            return $this->redirect($this->generateUrl('vencimiento_show', array('id' => $entity->getId())));
        }

        return $this->render('ContadoresBundle:Vencimiento:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Vencimiento entity.
     *
     */
    public function newAction()
    {
        $vencimientoService =  $this->get('contadores.servicios.vencimiento');
        $entity  = new Vencimiento();
        $form = $this->createForm(new VencimientoType($vencimientoService), $entity);

        return $this->render('ContadoresBundle:Vencimiento:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Vencimiento entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContadoresBundle:Vencimiento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Vencimiento entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ContadoresBundle:Vencimiento:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Vencimiento entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContadoresBundle:Vencimiento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Vencimiento entity.');
        }

        $vencimientoService =  $this->get('contadores.servicios.vencimiento');
        $editForm = $this->createForm(new VencimientoType($vencimientoService), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ContadoresBundle:Vencimiento:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Vencimiento entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContadoresBundle:Vencimiento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Vencimiento entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $vencimientoService =  $this->get('contadores.servicios.vencimiento');
        $editForm = $this->createForm(new VencimientoType($vencimientoService), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.update.success');

            $tareaService = $this->get('contadores.servicios.tareas');
            $tareaService->regenerarVencimientos($entity);
            return $this->redirect($this->generateUrl('vencimiento_edit', array('id' => $id)));
        } else {
            $this->get('session')->getFlashBag()->add('error', 'flash.update.error');
        }

        return $this->render('ContadoresBundle:Vencimiento:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Vencimiento entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ContadoresBundle:Vencimiento')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Vencimiento entity.');
            }

            $em->remove($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.delete.success');
        } else {
            $this->get('session')->getFlashBag()->add('error', 'flash.delete.error');
        }

        return $this->redirect($this->generateUrl('vencimiento'));
    }

    /**
     * Creates a form to delete a Vencimiento entity by id.
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
