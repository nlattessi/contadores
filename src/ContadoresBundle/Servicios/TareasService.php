<?php
/**
 * Created by PhpStorm.
 * User: fede
 * Date: 21-Aug-15
 * Time: 11:23 AM
 */

namespace ContadoresBundle\Servicios;



use ContadoresBundle\Entity\EstadoTarea;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManager;


class TareasService {
    protected $em;
    protected $usuarioService;
    static $tipoEstadoNuevo = 1;
    static $tipoEstadoFinalizado = 2;
    protected $rolContador;
    protected $rolCliente;
    protected $rolJefe;
    protected $estadosTerminales;

    public function __construct(EntityManager $entityManager, UsuarioService $us)
    {
        $this->em = $entityManager;
        $this->usuarioService = $us;
        $this->rolCliente = "ROLE_CLIENTE";
        $this->rolContador = "ROLE_CONTADOR";
        $this->rolJefe = "ROLE_JEFE";
        $this->estadosTerminales = array(2);
    }

    public function obtenerTareasUrgentesPorUsuario($usuario)
    {

        if($usuario->getRol()->getNombre() == $this->rolCliente)
        {
            return $this->obtenerTareasUrgentesPorCliente($usuario->getEntidadId());
        }else if ($usuario->getRol()->getNombre() == $this->rolContador)
        {
            return $this->obtenerTareasUrgentesPorContador($usuario->getEntidadId());
        }else if ($usuario->getRol()->getNombre() == $this->rolJefe)
        {
            return $this->obtenerTareasUrgentes();
        }
        return new ArrayCollection();
    }
    public function obtenerTareasUrgentes()
    {
        $urgente = new \DateTime(null);
        $urgente->add(new \DateInterval('P10D'));
        $queryBuilder = $this->em->getRepository('ContadoresBundle:Tarea')->createQueryBuilder('t')
            ->where('t.vencimientoInterno < ?1')
            ->andWhere('t.fechaFin is NULL')
            ->setParameter(1, $urgente);
        $tareas = $queryBuilder->getQuery()->getResult();

        return $tareas;
    }

    public function obtenerTareasPorCliente($id, $filterForm, $queryUpdater, $soloPendientes)
    {
        $queryBuilder = $this->em->getRepository('ContadoresBundle:Tarea')->createQueryBuilder('t')
            ->where('t.cliente = ?1')
            ->setParameter(1, $id);
        if($filterForm) {
            $queryUpdater->addFilterConditions($filterForm, $queryBuilder);
        }
        if($soloPendientes){
            $queryBuilder->andWhere('t.fechaFin is NULL');
        }

        $tareas = $queryBuilder->getQuery()->getResult();

        return $tareas;
    }
    public function obtenerTareasUrgentesPorCliente($id)
    {
        $urgente = new \DateTime(null);
        $urgente->add(new \DateInterval('P10D'));
        $queryBuilder = $this->em->getRepository('ContadoresBundle:Tarea')->createQueryBuilder('t')
            ->where('t.cliente = ?1')
            ->andWhere('t.vencimientoInterno < ?2')
            ->andWhere('t.fechaFin is NULL')
            ->setParameter(1, $id)
            ->setParameter(2, $urgente);
        $tareas = $queryBuilder->getQuery()->getResult();

        return $tareas;
    }


    public function obtenerTareasPorContador($id, $filterForm, $queryUpdater, $soloPendientes)
    {
        $queryBuilder = $this->em->getRepository('ContadoresBundle:Tarea')->createQueryBuilder('t')
            ->where('t.contador = ?1')
            ->setParameter(1, $id);
        if($filterForm) {
            $queryUpdater->addFilterConditions($filterForm, $queryBuilder);
        }
        if($soloPendientes){
            $queryBuilder->andWhere('t.fechaFin is NULL');
        }

        $tareas = $queryBuilder->getQuery()->getResult();

        return $tareas;
    }

    public function obtenerTareasUrgentesPorContador($id)
    {
        $urgente = new \DateTime(null);
        $urgente->add(new \DateInterval('P10D'));
        $queryBuilder = $this->em->getRepository('ContadoresBundle:Tarea')->createQueryBuilder('t')
            ->where('t.contador = ?1')
            ->andWhere('t.vencimientoInterno < ?2')
            ->andWhere('t.fechaFin is NULL')
            ->setParameter(1, $id)
            ->setParameter(2, $urgente);
        $tareas = $queryBuilder->getQuery()->getResult();

        return $tareas;
    }



    public function crearEstadoTareaNuevo($tarea, $tiempo)
    {
        return $this->crearEstadoTarea($tarea, $this::$tipoEstadoNuevo, $tiempo);
    }
    public function finalizarTareaConFecha($tarea,  $tiempo, $fechaFin){
        $this->finalizarTarea($tarea,  $tiempo);
        $tarea->setFechaFin($fechaFin);
        return $tarea;
    }

    public function finalizarTarea($tarea,  $tiempo){
        $this->cambiarEstadoTarea($tarea, $this->crearEstadoTareaFinalizado($tarea,  $tiempo));
    }

    public function crearEstadoTareaFinalizado($tarea,  $tiempo)
    {
        return $this->crearEstadoTarea($tarea, $this::$tipoEstadoFinalizado, $tiempo);
    }

    public function crearEstadoTarea($tarea, $tipoEstadoId, $tiempo){
        $tipoEstadoNuevo = $this->em->getRepository('ContadoresBundle:TipoEstado')->find($tipoEstadoId);
        $estadoTarea = new EstadoTarea();
        $estadoTarea->setTipoEstado($tipoEstadoNuevo);
        $estadoTarea->setTarea($tarea);
        $estadoTarea->setFechaInicio(new \DateTime(null));
        $estadoTarea->setFechaCreacion(new \DateTime(null));
        $estadoTarea->setMinutosTrabajados($tiempo);
        if($tarea->getContador()){
            $estadoTarea->setContador($tarea->getContador());
        }

        $this->em->persist($estadoTarea);
        $this->em->flush();

        return $estadoTarea;
    }

    public function verificarEstadoTarea($tarea,$tipoEstadoId){

        $tarea->setFechaFin(new \DateTime(null));
        $this->cambiarEstadoTarea($tarea, $tipoEstadoId);

    }

    public function cambiarEstadoTarea($tarea, $estadoTarea)
    {
        $estadoViejo = $tarea->getEstadoActual();
        if ($estadoViejo) {
            $estadoViejo->setFechaFin(new \DateTime(null));
            $this->em->persist($estadoViejo);
        }


        if(in_array($estadoTarea->getTipoEstado()->getId(),$this->estadosTerminales))
        {
            $estadoTarea->setFechaFin(new \DateTime(null));
        }

        $this->em->persist($estadoTarea);

        $tarea->setEstadoActual($estadoTarea);
        $this->em->persist($tarea);

        $this->em->flush();

        return $tarea;
    }

    public function obtenerContadoresHabilitados($usuario){

        $queryBuilder = $this->em->getRepository('ContadoresBundle:Contador')->createQueryBuilder('c')
            ->where('c.activo = true');

         if ($usuario->getRol() == $this->rolContador ){
            $contador = $this->usuarioService->obtenerContadorPorUsuario($usuario);
            if($contador->getEsJefe()){
                $queryBuilder->andWhere('c.area = ?1')
                    ->setParameter(1, $contador->getArea());
            }else{
                $queryBuilder->andWhere('c.id = ?1')
                    ->setParameter(1, $contador->getId());
            }

        }
        $contadores = $queryBuilder->getQuery()->getResult();
        return $contadores;
    }
    public function obtenerTareaMetadataHabilitada($usuario, $periodica){
        $queryBuilder = $this->em->getRepository('ContadoresBundle:TareaMetadata')->createQueryBuilder('t')
           ->where('t.activo = true');

        if($periodica){
            $queryBuilder->andWhere('t.esperiodica = true');
        }else{
            //para cubrir el null también
            $queryBuilder->andWhere('t.esperiodica = false');
        }

        if ($usuario->getRol() == $this->rolContador ){
            $contador = $this->usuarioService->obtenerContadorPorUsuario($usuario);
            $queryBuilder->andWhere('t.rubro in (?1)')
                    ->setParameter(1, $contador->getArea()->getRubros());
        }
        $contadores = $queryBuilder->getQuery()->getResult();
        return $contadores;
    }

}