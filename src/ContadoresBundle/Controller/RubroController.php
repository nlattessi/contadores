<?php

namespace ContadoresBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use ContadoresBundle\Utils\TwitterBootstrapViewCustom;

use ContadoresBundle\Entity\Rubro;
use ContadoresBundle\Form\RubroType;
use ContadoresBundle\Form\RubroFilterType;

/**
 * Rubro controller.
 *
 */
class RubroController extends Controller
{
    /**
     * Lists all Rubro entities.
     *
     */
    public function indexAction()
    {
        list($filterForm, $queryBuilder) = $this->filter();

        list($entities, $pagerHtml) = $this->paginator($queryBuilder);

        return $this->render('ContadoresBundle:Rubro:index.html.twig', array(
            'entities' => $entities,
            'pagerHtml' => $pagerHtml,
            'filterForm' => $filterForm->createView(),
            'css_active' => 'rubro'
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
        $filterForm = $this->createForm(new RubroFilterType($filtroService));
        $em = $this->getDoctrine()->getManager();
        $queryBuilder = $em->getRepository('ContadoresBundle:Rubro')->createQueryBuilder('e');

        // Reset filter
        if ($request->get('filter_action') == 'reset') {
            $session->remove('RubroControllerFilter');
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
                $session->set('RubroControllerFilter', $filterData);
            }
        } else {
            // Get filter from session
            if ($session->has('RubroControllerFilter')) {
                $filterData = $session->get('RubroControllerFilter');

                $filtroService =  $this->get('contadores.servicios.filtro');
                $filterForm = $this->createForm(new RubroFilterType($filtroService), $filterData);
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
            return $me->generateUrl('rubro', array('page' => $page));
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
     * Creates a new Rubro entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Rubro();
        $form = $this->createForm(new RubroType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.create.success');

            return $this->redirect($this->generateUrl('rubro_show', array('id' => $entity->getId())));
        }

        return $this->render('ContadoresBundle:Rubro:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'css_active' => 'rubro_new'
        ));
    }

    /**
     * Displays a form to create a new Rubro entity.
     *
     */
    public function newAction()
    {
        $entity = new Rubro();
        $form   = $this->createForm(new RubroType(), $entity);

        return $this->render('ContadoresBundle:Rubro:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'css_active' => 'rubro_new'
        ));
    }

    /**
     * Finds and displays a Rubro entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContadoresBundle:Rubro')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Rubro entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ContadoresBundle:Rubro:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
            'css_active' => 'rubro'       ));
    }

    /**
     * Displays a form to edit an existing Rubro entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContadoresBundle:Rubro')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Rubro entity.');
        }

        $editForm = $this->createForm(new RubroType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ContadoresBundle:Rubro:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Rubro entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContadoresBundle:Rubro')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Rubro entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new RubroType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.update.success');

            return $this->redirect($this->generateUrl('rubro_edit', array('id' => $id)));
        } else {
            $this->get('session')->getFlashBag()->add('error', 'flash.update.error');
        }

        return $this->render('ContadoresBundle:Rubro:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Rubro entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ContadoresBundle:Rubro')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Rubro entity.');
            }

            $em->remove($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.delete.success');
        } else {
            $this->get('session')->getFlashBag()->add('error', 'flash.delete.error');
        }

        return $this->redirect($this->generateUrl('rubro'));
    }

    /**
     * Creates a form to delete a Rubro entity by id.
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
