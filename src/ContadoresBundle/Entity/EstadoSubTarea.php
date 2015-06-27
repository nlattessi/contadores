<?php

namespace ContadoresBundle\Entity;
use Symfony\Component\Security\Core\Util\StringUtils;

/**
 * EstadoSubTarea
 */
class EstadoSubTarea
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $fechaInicio;

    /**
     * @var \DateTime
     */
    private $fechaFin;

    /**
     * @var integer
     */
    private $horasTrabajadas = '0';

    /**
     * @var \ContadoresBundle\Entity\Contador
     */
    private $contador;

    /**
     * @var \ContadoresBundle\Entity\SubTarea
     */
    private $subTarea;

    /**
     * @var \ContadoresBundle\Entity\TipoEstado
     */
    private $tipoEstado;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     *
     * @return EstadoSubTarea
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;

        return $this;
    }

    /**
     * Get fechaInicio
     *
     * @return \DateTime
     */
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    /**
     * Set fechaFin
     *
     * @param \DateTime $fechaFin
     *
     * @return EstadoSubTarea
     */
    public function setFechaFin($fechaFin)
    {
        $this->fechaFin = $fechaFin;

        return $this;
    }

    /**
     * Get fechaFin
     *
     * @return \DateTime
     */
    public function getFechaFin()
    {
        return $this->fechaFin;
    }

    /**
     * Set horasTrabajadas
     *
     * @param integer $horasTrabajadas
     *
     * @return EstadoSubTarea
     */
    public function setHorasTrabajadas($horasTrabajadas)
    {
        $this->horasTrabajadas = $horasTrabajadas;

        return $this;
    }

    /**
     * Get horasTrabajadas
     *
     * @return integer
     */
    public function getHorasTrabajadas()
    {
        return $this->horasTrabajadas;
    }

    /**
     * Set contador
     *
     * @param \ContadoresBundle\Entity\Contador $contador
     *
     * @return EstadoSubTarea
     */
    public function setContador(\ContadoresBundle\Entity\Contador $contador = null)
    {
        $this->contador = $contador;

        return $this;
    }

    /**
     * Get contador
     *
     * @return \ContadoresBundle\Entity\Contador
     */
    public function getContador()
    {
        return $this->contador;
    }

    /**
     * Set subTarea
     *
     * @param \ContadoresBundle\Entity\SubTarea $subTarea
     *
     * @return EstadoSubTarea
     */
    public function setSubTarea(\ContadoresBundle\Entity\SubTarea $subTarea = null)
    {
        $this->subTarea = $subTarea;

        return $this;
    }

    /**
     * Get subTarea
     *
     * @return \ContadoresBundle\Entity\SubTarea
     */
    public function getSubTarea()
    {
        return $this->subTarea;
    }

    /**
     * Set tipoEstado
     *
     * @param \ContadoresBundle\Entity\TipoEstado $tipoEstado
     *
     * @return EstadoSubTarea
     */
    public function setTipoEstado(\ContadoresBundle\Entity\TipoEstado $tipoEstado = null)
    {
        $this->tipoEstado = $tipoEstado;

        return $this;
    }

    /**
     * Get tipoEstado
     *
     * @return \ContadoresBundle\Entity\TipoEstado
     */
    public function getTipoEstado()
    {
        return $this->tipoEstado;
    }

    public function __toString(){
        return  (String) $this->id;
    }
}

