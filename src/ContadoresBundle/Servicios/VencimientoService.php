<?php
/**
 * Created by PhpStorm.
 * User: fede
 * Date: 19-Dec-15
 * Time: 09:34 PM
 */

namespace ContadoresBundle\Servicios;


use ContadoresBundle\Entity\Esquema;
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

    public function obtenerFalsoPeriodo(){
        $periodo = $this->em->getRepository('ContadoresBundle:Periodo')->findBy(array('id' => 1));

        return  $periodo;
    }
    public function obtenerFalsoEsquema(){
        $esquema = $this->em->getRepository('ContadoresBundle:Esquema')->findOneBy(array('id' => 1));

        return  $esquema;
    }
}