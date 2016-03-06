<?php

namespace ContadoresBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use ContadoresBundle\Utils\TwitterBootstrapViewCustom;

use ContadoresBundle\Entity\TareaMetadata;
use ContadoresBundle\Form\TareaMetadataType;
use ContadoresBundle\Form\TareaMetadataFilterType;

/**
 * TareaMetadata controller.
 *
 */
class TareaMetadataController extends Controller
{
    /**
     * Lists all TareaMetadata entities.
     *
     */
    public function indexAction()
    {
        list($filterForm, $queryBuilder) = $this->filter();

        list($entities, $pagerHtml) = $this->paginator($queryBuilder);

        return $this->render('ContadoresBundle:TareaMetadata:index.html.twig', array(
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
        $filterForm = $this->createForm(new TareaMetadataFilterType($filtroService));
        $em = $this->getDoctrine()->getManager();
        $queryBuilder = $em->getRepository('ContadoresBundle:TareaMetadata')->createQueryBuilder('e');

        // Solo entidades activas
        $queryBuilder = $em->getRepository('ContadoresBundle:TareaMetadata')->createQueryBuilder('d')
            ->andWhere('d.activo = ?1')
            ->setParameter(1, true)
        ;

        // Reset filter
        if ($request->get('filter_action') == 'reset') {
            $session->remove('TareaMetadataControllerFilter');
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
                $session->set('TareaMetadataControllerFilter', $filterData);
            }
        } else {
            // Get filter from session
            if ($session->has('TareaMetadataControllerFilter')) {
                $filterData = $session->get('TareaMetadataControllerFilter');

                $filtroService =  $this->get('contadores.servicios.filtro');
                $filterForm = $this->createForm(new TareaMetadataFilterType($filtroService), $filterData);
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
            return $me->generateUrl('tareametadata', array('page' => $page));
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
     * Creates a new TareaMetadata entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new TareaMetadata();
        $form = $this->createForm(new TareaMetadataType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            if (isset($request->files->get('archivos')[0])) {
                $archivoService = $this->get('contadores.servicios.archivo');
                foreach ($request->files->get('archivos') as $archivo) {
                    $archivoService->createArchivoTareaMetadata(
                        $archivo,
                        $this->getUser(),
                        $entity
                    );
                }
            }

            $this->get('session')->getFlashBag()->add('success', 'flash.create.success');

            return $this->redirect($this->generateUrl('tareametadata_show', array('id' => $entity->getId())));
        }

        return $this->render('ContadoresBundle:TareaMetadata:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new TareaMetadata entity.
     *
     */
    public function newAction()
    {
        $entity = new TareaMetadata();
        $form   = $this->createForm(new TareaMetadataType(), $entity);

        return $this->render('ContadoresBundle:TareaMetadata:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TareaMetadata entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContadoresBundle:TareaMetadata')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TareaMetadata entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ContadoresBundle:TareaMetadata:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing TareaMetadata entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContadoresBundle:TareaMetadata')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TareaMetadata entity.');
        }

        $editForm = $this->createForm(new TareaMetadataType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ContadoresBundle:TareaMetadata:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing TareaMetadata entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContadoresBundle:TareaMetadata')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TareaMetadata entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new TareaMetadataType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            if (isset($request->files->get('archivos')[0])) {
                $archivoService = $this->get('contadores.servicios.archivo');
                foreach ($request->files->get('archivos') as $archivo) {
                    $archivoService->createArchivoTareaMetadata(
                        $archivo,
                        $this->getUser(),
                        $entity
                    );
                }
            }

            $this->get('session')->getFlashBag()->add('success', 'flash.update.success');

            return $this->redirect($this->generateUrl('tareametadata_edit', array('id' => $id)));
        } else {
            $this->get('session')->getFlashBag()->add('error', 'flash.update.error');
        }

        return $this->render('ContadoresBundle:TareaMetadata:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a TareaMetadata entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ContadoresBundle:TareaMetadata')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TareaMetadata entity.');
            }

            $em->remove($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.delete.success');
        } else {
            $this->get('session')->getFlashBag()->add('error', 'flash.delete.error');
        }

        return $this->redirect($this->generateUrl('tareametadata'));
    }

    /**
     * Creates a form to delete a TareaMetadata entity by id.
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

    public function darDeBajaAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $tareaMetadata = $em->getRepository('ContadoresBundle:TareaMetadata')->find($id);

        if (!$tareaMetadata) {
            throw $this->createNotFoundException('Unable to find TareaMetadata entity.');
        }

        if (count($tareaMetadata->getTareas()) > 0) {
            $this->get('session')->getFlashBag()->add('error', 'No se puede dar de baja ya que existen tareas activas.');
            return $this->redirect($this->generateUrl('tareametadata_show', ['id' => $tareaMetadata->getId()]));
        }

        $bajaAdministrativaService = $this->get('contadores.servicios.bajaAdministrativa');
        $bajaAdministrativaService->darDeBaja($tareaMetadata);

        $this->get('session')->getFlashBag()->add('success', 'Se realizó la baja administrativa.');

        return $this->redirect($this->generateUrl('tareametadata'));
    }
}
