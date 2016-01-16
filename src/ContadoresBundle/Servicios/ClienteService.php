<?php

namespace ContadoresBundle\Servicios;

use Doctrine\ORM\EntityManager;


class ClienteService
{
    protected $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }


    public function obtenerClientesActivos(){

        $queryBuilder = $this->em->getRepository('ContadoresBundle:Cliente')->createQueryBuilder('c')
            ->where('c.activo = true');

        return $queryBuilder->getQuery()->getResult();
    }

}
