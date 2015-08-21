<?php
/**
 * Created by PhpStorm.
 * User: fede
 * Date: 21-Aug-15
 * Time: 11:23 AM
 */

namespace ContadoresBundle\Servicios;


use Doctrine\ORM\EntityManager;


class TareasService {
    protected $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
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

}