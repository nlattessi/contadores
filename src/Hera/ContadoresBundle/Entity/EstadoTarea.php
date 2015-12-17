<?php

namespace Hera\ContadoresBundle\Entity;

/**
 * EstadoTarea
 */
class EstadoTarea
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
    private $minutosTrabajados = '0';

    /**
     * @var \Hera\ContadoresBundle\Entity\Tarea
     */
    private $tarea;

    /**
     * @var \Hera\ContadoresBundle\Entity\TipoEstado
     */
    private $tipoEstado;

    /**
     * @var \Hera\ContadoresBundle\Entity\Contador
     */
    private $contador;


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
     * @return EstadoTarea
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
     * @return EstadoTarea
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
     * Set minutosTrabajados
     *
     * @param integer $minutosTrabajados
     *
     * @return EstadoTarea
     */
    public function setMinutosTrabajados($minutosTrabajados)
    {
        $this->minutosTrabajados = $minutosTrabajados;

        return $this;
    }

    /**
     * Get minutosTrabajados
     *
     * @return integer
     */
    public function getMinutosTrabajados()
    {
        return $this->minutosTrabajados;
    }

    /**
     * Set tarea
     *
     * @param \Hera\ContadoresBundle\Entity\Tarea $tarea
     *
     * @return EstadoTarea
     */
    public function setTarea(\Hera\ContadoresBundle\Entity\Tarea $tarea = null)
    {
        $this->tarea = $tarea;

        return $this;
    }

    /**
     * Get tarea
     *
     * @return \Hera\ContadoresBundle\Entity\Tarea
     */
    public function getTarea()
    {
        return $this->tarea;
    }

    /**
     * Set tipoEstado
     *
     * @param \Hera\ContadoresBundle\Entity\TipoEstado $tipoEstado
     *
     * @return EstadoTarea
     */
    public function setTipoEstado(\Hera\ContadoresBundle\Entity\TipoEstado $tipoEstado = null)
    {
        $this->tipoEstado = $tipoEstado;

        return $this;
    }

    /**
     * Get tipoEstado
     *
     * @return \Hera\ContadoresBundle\Entity\TipoEstado
     */
    public function getTipoEstado()
    {
        return $this->tipoEstado;
    }

    /**
     * Set contador
     *
     * @param \Hera\ContadoresBundle\Entity\Contador $contador
     *
     * @return EstadoTarea
     */
    public function setContador(\Hera\ContadoresBundle\Entity\Contador $contador = null)
    {
        $this->contador = $contador;

        return $this;
    }

    /**
     * Get contador
     *
     * @return \Hera\ContadoresBundle\Entity\Contador
     */
    public function getContador()
    {
        return $this->contador;
    }
    /**
     * @var \DateTime
     */
    private $fechaCreacion;


    /**
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     *
     * @return EstadoTarea
     */
    public function setFechaCreacion($fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;

        return $this;
    }

    /**
     * Get fechaCreacion
     *
     * @return \DateTime
     */
    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }
}
