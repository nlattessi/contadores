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
    public function obtenerRubrosPorArea($areaId){
        $queryBuilder = $this->em->getRepository('ContadoresBundle:Rubro')->createQueryBuilder('e')
            ->where('e.area = ?1')
            ->setParameter(1, $areaId);
        return $queryBuilder->getQuery()->getResult();
    }
    public function obtenerRubrosPorAreaReporte($areaId){
        $queryBuilder = $this->em->getRepository('ContadoresBundle:Rubro')->createQueryBuilder('e')
            ->select('e.id, e.nombre')
            ->where('e.area = ?1')
            ->setParameter(1, $areaId);
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
    public function obtenerTareaMetadataPorRubro($rubroId){
        $queryBuilder = $this->em->getRepository('ContadoresBundle:TareaMetadata')->createQueryBuilder('e')
            ->where('e.activo = true')
            ->andWhere('e.rubro = ?1')
            ->setParameter(1, $rubroId);
        return $queryBuilder->getQuery()->getResult();
    }
    public function obtenerTareaMetadataPorRubroReporte($rubroId){
        $queryBuilder = $this->em->getRepository('ContadoresBundle:TareaMetadata')->createQueryBuilder('e')
            ->select('e.id, e.nombre')
            ->where('e.activo = true')
            ->andWhere('e.rubro = ?1')
            ->setParameter(1, $rubroId);
        return $queryBuilder->getQuery()->getResult();
    }
    public function obtenerTareaMetadataPorArea($area)
    {
        $queryBuilder = $this->em->getRepository('ContadoresBundle:TareaMetadata')->createQueryBuilder('e')
            ->join('ContadoresBundle:Rubro','r', 'WITH', 'r.id = e.rubro')
            ->where('e.activo = true')
            ->andWhere('r.area = ?1')
            ->setParameter(1, $area);

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
    public function obtenerEsquemasActivos(){
        $queryBuilder = $this->em->getRepository('ContadoresBundle:Esquema')->createQueryBuilder('e');
        return $queryBuilder->getQuery()->getResult();
    }



}