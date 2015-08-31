<?php
/**
 * Created by PhpStorm.
 * User: fede
 * Date: 21-Aug-15
 * Time: 11:23 AM
 */

namespace ContadoresBundle\Servicios;


use ContadoresBundle\Entity\EstadoSubTarea;
use ContadoresBundle\Entity\EstadoTarea;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManager;


class TareasService {
    protected $em;
    protected $tipoEstadoNuevo;
    protected $rolContador;
    protected $rolCliente;
    protected $estadosTerminales;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
        $this->tipoEstadoNuevo = 1;
        $this->rolCliente = "ROLE_CLIENTE";
        $this->rolContador = "ROLE_CONTADOR";
        $this->estadosTerminales = array(3);
    }

    public function obtenerTareasUrgentesPorUsuario($usuario)
    {

        if($usuario->getRol()->getNombre() == $this->rolCliente)
        {
            return $this->obtenerTareasUrgentesPorCliente($usuario->getEntidadId());
        }else if ($usuario->getRol()->getNombre() == $this->rolContador)
        {
            return $this->obtenerTareasUrgentesPorContador($usuario->getEntidadId());
        }
        return new ArrayCollection();
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

    public function cambiarEstadoSubTarea($subTareaId, $nuevoEstadoId, $horas){

        $tipoEstado =  $this->em->getRepository('ContadoresBundle:TipoEstado')->find($nuevoEstadoId);
        $subTarea = $this->em->getRepository('ContadoresBundle:SubTarea')->find($subTareaId);
        if($horas == null){
            $horas = 0;
        }

        $estadoViejo = $subTarea->getEstadoActual();
        $estadoViejo->setFechaFin(new \DateTime(null));
        $estadoViejo->setHorasTrabajadas($horas);
        $this->em->persist($estadoViejo);

        $estadoSubTarea = $this->crearEstadoSubTarea($subTarea,$tipoEstado);

        if(in_array($nuevoEstadoId,$this->estadosTerminales))
        {
            $estadoSubTarea->setFechaFin(new \DateTime(null));
            $this->verificarEstadoTarea($subTarea->getTarea(),$nuevoEstadoId );
        }

      //  $estadoSubTarea->setContador($subTarea->getTarea()->getContador());
        $this->em->persist($estadoSubTarea);

        $subTarea->sumarTiempo($horas);
        $subTarea->setEstadoActual($estadoSubTarea);
        $this->em->persist($subTarea);

        $this->em->flush();

        return $subTarea;
    }

    public function crearEstadoSubTareaNuevo($subTarea)
    {
        return $this->crearEstadoSubTarea($subTarea, $this->tipoEstadoNuevo);
    }

    public function crearEstadoSubTarea($subTarea, $tipoEstado){

        $estadoSubTarea = new EstadoSubTarea();
        $estadoSubTarea->setTipoEstado($tipoEstado);
        $estadoSubTarea->setSubTarea($subTarea);
        $estadoSubTarea->setFechaInicio(new \DateTime(null));

        $this->em->persist($estadoSubTarea);
        $this->em->flush();

        return $estadoSubTarea;
    }

    public function crearEstadoTareaNuevo($tarea)
    {
        return $this->crearEstadoTarea($tarea, $this->tipoEstadoNuevo);
    }

    public function crearEstadoTarea($tarea, $tipoEstadoId){
        $tipoEstadoNuevo = $this->em->getRepository('ContadoresBundle:TipoEstado')->find($tipoEstadoId);
        $estadoTarea = new EstadoTarea();
        $estadoTarea->setTipoEstado($tipoEstadoNuevo);
        $estadoTarea->setTarea($tarea);
        $estadoTarea->setFechaInicio(new \DateTime(null));

        $this->em->persist($estadoTarea);
        $this->em->flush();

        return $estadoTarea;
    }

    public function verificarEstadoTarea($tarea,$tipoEstadoId){

        foreach( $tarea->getSubTareas() as $subTarea )
        {
            if(! in_array($subTarea->getEstadoActual()->getTipoEstado()->getId(),$this->estadosTerminales)){
                return false;
            }
        }
        $tarea->setFechaFin(new \DateTime(null));
        $this->cambiarEstadoTarea($tarea, $tipoEstadoId);

    }

    public function cambiarEstadoTarea($tarea, $nuevoEstadoId)
    {
        $estadoViejo = $tarea->getEstadoActual();
        $estadoViejo->setFechaFin(new \DateTime(null));
        $this->em->persist($estadoViejo);

        $estadoTarea = $this->crearEstadoTarea($tarea,$nuevoEstadoId);

        if(in_array($nuevoEstadoId,$this->estadosTerminales))
        {
            $estadoTarea->setFechaFin(new \DateTime(null));
        }

        //  $estadoSubTarea->setContador($subTarea->getTarea()->getContador());
        $this->em->persist($estadoTarea);

        $tarea->setEstadoActual($estadoTarea);
        $this->em->persist($tarea);

        $this->em->flush();

        return $tarea;
    }

}