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
use Doctrine\ORM\EntityManager;


class TareasService {
    protected $em;
    protected $tipoEstadoNuevo;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
        $this->tipoEstadoNuevo = 1;
    }

    public function obtenerTareasPorCliente($id)
    {
        $queryBuilder = $this->em->getRepository('ContadoresBundle:Tarea')->createQueryBuilder('t')
            ->where('t.cliente = ?1')
            ->setParameter(1, $id);
        $tareas = $queryBuilder->getQuery()->getResult();

        return $tareas;
    }

    public function obtenerTareasPorContador($id)
    {
        $queryBuilder = $this->em->getRepository('ContadoresBundle:Tarea')->createQueryBuilder('t')
            ->where('t.contador = ?1')
            ->setParameter(1, $id);
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

        $estadoSubTarea = new EstadoSubTarea();
        $estadoSubTarea->setTipoEstado($tipoEstado);
        $estadoSubTarea->setSubTarea($subTarea);
        $estadoSubTarea->setFechaInicio(new \DateTime(null));
      //  $estadoSubTarea->setContador($subTarea->getTarea()->getContador());
        $this->em->persist($estadoSubTarea);

        $subTarea->sumarTiempo($horas);
        $subTarea->setEstadoActual($estadoSubTarea);
        $this->em->persist($subTarea);

        $this->em->flush();
    }

    public function crearEstadoSubTareaNuevo($subTarea)
    {
        return $this->crearEstadoSubTarea($subTarea, $this->tipoEstadoNuevo);
    }

    public function crearEstadoSubTarea($subTarea, $tipoEstado){
        $tipoEstadoNuevo = $this->em->getRepository('ContadoresBundle:TipoEstado')->find($tipoEstado);
        $estadoSubTarea = new EstadoSubTarea();
        $estadoSubTarea->setTipoEstado($tipoEstadoNuevo);
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

    public function crearEstadoTarea($tarea, $tipoEstado){
        $tipoEstadoNuevo = $this->em->getRepository('ContadoresBundle:TipoEstado')->find($tipoEstado);
        $estadoTarea = new EstadoTarea();
        $estadoTarea->setTipoEstado($tipoEstadoNuevo);
        $estadoTarea->setTarea($tarea);
        $estadoTarea->setFechaInicio(new \DateTime(null));

        $this->em->persist($estadoTarea);
        $this->em->flush();

        return $estadoTarea;
    }

}