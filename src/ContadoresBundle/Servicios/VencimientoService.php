<?php
/**
 * Created by PhpStorm.
 * User: fede
 * Date: 19-Dec-15
 * Time: 09:34 PM
 */

namespace ContadoresBundle\Servicios;


use ContadoresBundle\Entity\Cliente;
use ContadoresBundle\Entity\Esquema;
use ContadoresBundle\Entity\Periodo;
use ContadoresBundle\Entity\Vencimiento;
use Doctrine\ORM\EntityManager;

class VencimientoService {

    protected $em;
    static $nproximos = 3;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    public function obtenerEsquemasHabilitados(){
        $esquemas = $this->em->getRepository('ContadoresBundle:Esquema')->findAll();

        return $esquemas;
    }

    public function obtenerPeriodosPorEsquema(Esquema $esquema){
        $periodos = $this->em->getRepository('ContadoresBundle:Periodo')->findBy(array('esquema' => $esquema));

        return $periodos;
    }
    public function obtenerPeriodosPorEsquemaIdReporte($esquemaId)
    {
        $queryBuilder = $this->em->getRepository('ContadoresBundle:Periodo')->createQueryBuilder('p')
            ->select('p.id, p.nombre')
            ->where('p.esquema = ?1')
            ->setParameter(1, $esquemaId);

        $periodos = $queryBuilder->getQuery()->getResult();

        return $periodos;
    }

    public function obtenerVencimientoFiscal(Periodo $periodo, Cliente $cliente){

        $queryBuilder = $this->em->getRepository('ContadoresBundle:Vencimiento')->createQueryBuilder('v')
            ->where('v.periodo = ?1')
            ->andWhere('v.colaCuil = ?2')
            ->setParameter(1, $periodo)
            ->setParameter(2, substr($cliente->getCuit(),-1));

        $vencimiento = $queryBuilder->getQuery()->getSingleResult();

        return $vencimiento;
    }
    public function obtenerVencimientosFiscales(Periodo $periodo, Cliente $cliente){
        $periodos = $this->obtenerPeriodosPorEsquema($periodo->getEsquema());
        //en $periodos tengo los periodos del mismo esquema que el seleccionado
        //tomo el $periodo como el mínimo que voy a usar

        $queryBuilder = $this->em->getRepository('ContadoresBundle:Vencimiento')->createQueryBuilder('v')
            ->where('v.periodo in (?1)')
            ->andWhere('v.periodo >= ?2')
            ->andWhere('v.colaCuil = ?3')
            ->setParameter(1, $periodos)
            ->setParameter(2, $periodo->getId())
            ->setParameter(3, substr($cliente->getCuit(),-1));

        $vencimientos = $queryBuilder->getQuery()->getResult();

        return $vencimientos;
    }
    public function obtenerVencimientosPorPeriodo($periodoId){

        $queryBuilder = $this->em->getRepository('ContadoresBundle:Vencimiento')->createQueryBuilder('v')
            ->where('v.periodo =  ?1')
            ->setParameter(1, $periodoId);

        $vencimientos = $queryBuilder->getQuery()->getResult();

        return $vencimientos;
    }


    public function obtenerProximosVencimientos(){
        return $this->obtenerNProximosVencimientos($this::$nproximos);
    }

    public function obtenerNProximosVencimientos($i){

        $queryBuilder = $this->em->getRepository('ContadoresBundle:Vencimiento')->createQueryBuilder('v')
            ->where('v.fecha > ?1')
            ->setParameter(1, new \DateTime('now'))
        ->orderBy('v.fecha')
        ->setMaxResults($i);

        $vencimiento = $queryBuilder->getQuery()->getResult();

        return $vencimiento;
    }



}