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
use Doctrine\ORM\EntityManager;

class VencimientoService {

    protected $em;

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

    public function obtenerVencimientoFiscal(Periodo $periodo, Cliente $cliente){

        $queryBuilder = $this->em->getRepository('ContadoresBundle:Vencimiento')->createQueryBuilder('v')
            ->where('v.periodo = ?1')
            ->andWhere('v.colaCuil = ?2')
            ->setParameter(1, $periodo)
            ->setParameter(2, substr($cliente->getCuit(),-1));

        $vencimiento = $queryBuilder->getQuery()->getSingleResult();

        return $vencimiento;
    }

}