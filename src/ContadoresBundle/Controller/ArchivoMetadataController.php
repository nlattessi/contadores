<?php

namespace ContadoresBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use ContadoresBundle\Utils\TwitterBootstrapViewCustom;

use ContadoresBundle\Entity\ArchivoMetadata;
use ContadoresBundle\Form\ArchivoMetadataType;
use ContadoresBundle\Form\ArchivoMetadataFilterType;

/**
 * ArchivoMetadata controller.
 *
 */
class ArchivoMetadataController extends Controller
{
    /**
     * Lists all ArchivoMetadata entities.
     *
     */
    public function indexAction()
    {
        list($filterForm, $queryBuilder) = $this->filter();

        list($entities, $pagerHtml) = $this->paginator($queryBuilder);

        return $this->render('ContadoresBundle:ArchivoMetadata:index.html.twig', array(
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
        $filterForm = $this->createForm(new ArchivoMetadataFilterType());
        $em = $this->getDoctrine()->getManager();
        $queryBuilder = $em->getRepository('ContadoresBundle:ArchivoMetadata')->createQueryBuilder('e');

        // Reset filter
        if ($request->get('filter_action') == 'reset') {
            $session->remove('ArchivoMetadataControllerFilter');
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
                $session->set('ArchivoMetadataControllerFilter', $filterData);
            }
        } else {
            // Get filter from session
            if ($session->has('ArchivoMetadataControllerFilter')) {
                $filterData = $session->get('ArchivoMetadataControllerFilter');
                $filterForm = $this->createForm(new ArchivoMetadataFilterType(), $filterData);
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
            return $me->generateUrl('archivometadata', array('page' => $page));
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
     * Creates a new ArchivoMetadata entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new ArchivoMetadata();
        $form = $this->createForm(new ArchivoMetadataType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.create.success');

            return $this->redirect($this->generateUrl('archivometadata_show', array('id' => $entity->getId())));
        }

        return $this->render('ContadoresBundle:ArchivoMetadata:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new ArchivoMetadata entity.
     *
     */
    public function newAction()
    {
        $entity = new ArchivoMetadata();
        $form   = $this->createForm(new ArchivoMetadataType(), $entity);

        return $this->render('ContadoresBundle:ArchivoMetadata:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ArchivoMetadata entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContadoresBundle:ArchivoMetadata')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ArchivoMetadata entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ContadoresBundle:ArchivoMetadata:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing ArchivoMetadata entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContadoresBundle:ArchivoMetadata')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ArchivoMetadata entity.');
        }

        $editForm = $this->createForm(new ArchivoMetadataType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ContadoresBundle:ArchivoMetadata:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing ArchivoMetadata entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContadoresBundle:ArchivoMetadata')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ArchivoMetadata entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ArchivoMetadataType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.update.success');

            return $this->redirect($this->generateUrl('archivometadata_edit', array('id' => $id)));
        } else {
            $this->get('session')->getFlashBag()->add('error', 'flash.update.error');
        }

        return $this->render('ContadoresBundle:ArchivoMetadata:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ArchivoMetadata entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ContadoresBundle:ArchivoMetadata')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ArchivoMetadata entity.');
            }

            $em->remove($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.delete.success');
        } else {
            $this->get('session')->getFlashBag()->add('error', 'flash.delete.error');
        }

        return $this->redirect($this->generateUrl('archivometadata'));
    }

    /**
     * Creates a form to delete a ArchivoMetadata entity by id.
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
