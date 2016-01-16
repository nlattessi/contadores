<?php
/**
 * Created by PhpStorm.
 * User: fede
 * Date: 13-Jan-16
 * Time: 04:58 PM
 */

namespace ContadoresBundle\Servicios;

use Doctrine\ORM\EntityManager;

class FiltroService {
    protected $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    public function obtenerAreasActivas(){
        $queryBuilder = $this->em->getRepository('ContadoresBundle:Area')->createQueryBuilder('e')   ;
        return $queryBuilder->getQuery()->getResult();
    }
    public function obtenerRubrosActivos(){
        $queryBuilder = $this->em->getRepository('ContadoresBundle:Rubro')->createQueryBuilder('e')   ;
        return $queryBuilder->getQuery()->getResult();
    }
    public function obtenerPeriodosActivos(){
        $queryBuilder = $this->em->getRepository('ContadoresBundle:Periodo')->createQueryBuilder('e')   ;
        return $queryBuilder->getQuery()->getResult();
    }
    public function obtenerTareaMetadataActivas(){
        $queryBuilder = $this->em->getRepository('ContadoresBundle:TareaMetadata')->createQueryBuilder('e')
        ->where('e.activo = true');
        return $queryBuilder->getQuery()->getResult();
    }
    public function obtenerClientesActivos(){
        $queryBuilder = $this->em->getRepository('ContadoresBundle:Cliente')->createQueryBuilder('e')
            ->where('e.activo = true');
        return $queryBuilder->getQuery()->getResult();
    }
    public function obtenerContadoresActivos(){
        $queryBuilder = $this->em->getRepository('ContadoresBundle:Contador')->createQueryBuilder('e')
            ->where('e.activo = true');
        return $queryBuilder->getQuery()->getResult();
    }

}