<?php


namespace ContadoresBundle\Controller;
use ContadoresBundle\Servicios\FiltroService;
use ContadoresBundle\Servicios\VencimientoService;
use ContadoresBundle\Utils\Herramientas;
use Doctrine\ORM\QueryBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ReporteController extends Controller{


    public function busquedaAjaxAction(Request $request)
    {
        if ($request->get('busqRubro')) {
            return $this->cargarRubros($request->get('area'));
        }
        if ($request->get('busqMetadata')) {
            return $this->cargarMetadata($request->get('rubro'));
        }
        if ($request->get('busqPeriodo')){
            return $this->cargarPeriodos($request->get('esquema'));
        }
    }

    public function cargarRubros($areaId){
        /* @var $filtroService FiltroService */
        $filtroService = $this->get('contadores.servicios.filtro');
        $rubros = $filtroService->obtenerRubrosPorAreaReporte($areaId);
        $response = new JsonResponse();
        $response->setData($rubros);
        return $response;
    }

    public function cargarMetadata($rubroId){
        /* @var $filtroService FiltroService */
        $filtroService = $this->get('contadores.servicios.filtro');
        $metadata = $filtroService->obtenerTareaMetadataPorRubroReporte($rubroId);
        $response = new JsonResponse();
        $response->setData($metadata);
        return $response;
    }
    private function cargarPeriodos($esquemaId)
    {
        /* @var $vencimientoService VencimientoService */
        $vencimientoService = $this->get('contadores.servicios.vencimiento');
        $periodos = $vencimientoService->obtenerPeriodosPorEsquemaIdReporte($esquemaId);
        $response = new JsonResponse();
        $response->setData($periodos);
        return $response;
    }

    public function newAction()
    {
        /* @var $filtroService FiltroService */
        $filtroService = $this->get('contadores.servicios.filtro');
        $contadores = $filtroService->obtenerContadoresActivos();
        $clientes = $filtroService->obtenerClientesActivos();
        $areas = $filtroService->obtenerAreasActivas();
        $esquemas = $filtroService->obtenerEsquemasActivos();


        return $this->render('ContadoresBundle:Reportes:new.html.twig', array(
            'contadores' => $contadores,
            'clientes' => $clientes,
            'areas' => $areas,
            'esquemas' => $esquemas,
        ));
    }

    public function filtrarAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $cliente = $request->request->get('cliente');
        $periodo = $request->request->get('periodo');
        $contador = $request->request->get('contador');
        $area = $request->request->get('area');
        $rubro = $request->request->get('rubro');
        $metadata = $request->request->get('metadata');
        $fechaDesde = $request->request->get('fechaD');
        $fechaHasta = $request->request->get('fechaH');


        /* @var $queryBuilder QueryBuilder */
        $queryBuilder = $em->getRepository('ContadoresBundle:Tarea')->createQueryBuilder('t');
        $queryBuilder
            ->select("t.id AS id, t.nombre as Nombre, d.nombre as Cliente, CONCAT(CONCAT(c.nombre, ', '), c.apellido) as Contador, m.nombre as Tarea, t.vencimientoInterno as Vencimiento")
            ->join('ContadoresBundle:Contador','c', 'WITH', 'c.id = t.contador')
            ->join('ContadoresBundle:Cliente','d', 'WITH', 'd.id = t.cliente')
            ->join('ContadoresBundle:TareaMetadata','m', 'WITH', 'm.id = t.tareaMetadata')
        ;

        if($cliente and strlen($cliente) > 0){
            $queryBuilder->andWhere('t.cliente = :cliente')
            ->setParameter("cliente" , $cliente);
        }
        print $periodo;
        if($periodo and strlen($periodo) > 0 ){
            /* @var $vencimientoService VencimientoService */
            $vencimientoService = $this->get('contadores.servicios.vencimiento');
            $vencimientos = $vencimientoService->obtenerVencimientosPorPeriodo($periodo);
            $queryBuilder->andWhere('t.vencimientoFiscal in (:vencimientos)')
                ->setParameter("vencimientos" , $vencimientos);
        }
        if($contador and strlen($contador) > 0){
            $queryBuilder->andWhere('t.contador = :contador')
                ->setParameter("contador" , $contador);
        }
        if($metadata and strlen($metadata) > 0){
            $queryBuilder->andWhere('t.tareaMetadata = :tareaMetadata')
                ->setParameter("tareaMetadata" , $metadata);
        }elseif($rubro and strlen($rubro) > 0){
            /* @var $filtroService FiltroService */
            $filtroService = $this->get('contadores.servicios.filtro');
            $metadatas = $filtroService->obtenerTareaMetadataPorRubro($rubro);
            $queryBuilder->andWhere('t.tareaMetadata in (:tareaMetadata)')
                ->setParameter("tareaMetadata" , $metadatas);
        }elseif($area and strlen($area) > 0){
            /* @var $filtroService FiltroService */
            $filtroService = $this->get('contadores.servicios.filtro');
            $metadatas = $filtroService->obtenerTareaMetadataPorArea($area);
            $queryBuilder->andWhere('t.tareaMetadata in (:tareaMetadata)')
                ->setParameter("tareaMetadata" , $metadatas);
        }
        if($fechaDesde and strlen($fechaDesde) > 0){
            $fechaD = Herramientas::textoADatetime($fechaDesde);
            $queryBuilder->andWhere('t.vencimientoInterno > :fechaD')
                ->setParameter("fechaD" , $fechaD);
        }
        if($fechaHasta and strlen($fechaHasta) > 0){
            $fechaH = Herramientas::textoADatetime($fechaHasta);
            $queryBuilder->andWhere('t.vencimientoInterno < :fechaH')
                ->setParameter("fechaH" , $fechaH);
        }

        $tareas = $queryBuilder->getQuery()->getResult();

       /* print json_encode($tareas);
        print $queryBuilder->getQuery()->getDQL();
        exit;*/
        $columnas = array();

        array_push($columnas, array ('data' =>"id"));
        array_push($columnas, array ('data' =>"Nombre"));
        array_push($columnas, array ('data' =>"Cliente"));
        array_push($columnas, array ('data' =>"Contador"));
        array_push($columnas, array ('data' =>"Tarea"));
        array_push($columnas, array ('data' =>"Vencimiento"));

        return $this->render('ContadoresBundle:Reportes:resultado.html.twig', array('columnas' => $columnas,
            'datos' => $tareas,
            'css_active' => 'reporte',));
    }


}