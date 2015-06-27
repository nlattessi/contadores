<?php

namespace ContadoresBundle\Entity;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * SubTarea
 */
class SubTarea
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
     * @var \DateTime
     */
    private $fechaCreacion ;

    /**
     * @var integer
     */
    private $tiempoEmpleado = '0';

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var \ContadoresBundle\Entity\EstadoSubTarea
     */
    private $estadoActual;

    /**
     * @var \ContadoresBundle\Entity\SubTareaMetadata
     */
    private $subTareaMetadata;

    /**
     * @var \ContadoresBundle\Entity\Tarea
     */
    private $tarea;


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
     * @return SubTarea
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
     * @return SubTarea
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
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     *
     * @return SubTarea
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

    /**
     * Set tiempoEmpleado
     *
     * @param integer $tiempoEmpleado
     *
     * @return SubTarea
     */
    public function setTiempoEmpleado($tiempoEmpleado)
    {
        $this->tiempoEmpleado = $tiempoEmpleado;

        return $this;
    }

    /**
     * Get tiempoEmpleado
     *
     * @return integer
     */
    public function getTiempoEmpleado()
    {
        return $this->tiempoEmpleado;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return SubTarea
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set estadoActual
     *
     * @param \ContadoresBundle\Entity\EstadoSubTarea $estadoActual
     *
     * @return SubTarea
     */
    public function setEstadoActual(\ContadoresBundle\Entity\EstadoSubTarea $estadoActual = null)
    {
        $this->estadoActual = $estadoActual;

        return $this;
    }

    /**
     * Get estadoActual
     *
     * @return \ContadoresBundle\Entity\EstadoSubTarea
     */
    public function getEstadoActual()
    {
        return $this->estadoActual;
    }

    /**
     * Set subTareaMetadata
     *
     * @param \ContadoresBundle\Entity\SubTareaMetadata $subTareaMetadata
     *
     * @return SubTarea
     */
    public function setSubTareaMetadata(\ContadoresBundle\Entity\SubTareaMetadata $subTareaMetadata = null)
    {
        $this->subTareaMetadata = $subTareaMetadata;

        return $this;
    }

    /**
     * Get subTareaMetadata
     *
     * @return \ContadoresBundle\Entity\SubTareaMetadata
     */
    public function getSubTareaMetadata()
    {
        return $this->subTareaMetadata;
    }

    /**
     * Set tarea
     *
     * @param \ContadoresBundle\Entity\Tarea $tarea
     *
     * @return SubTarea
     */
    public function setTarea(\ContadoresBundle\Entity\Tarea $tarea = null)
    {
        $this->tarea = $tarea;

        return $this;
    }

    /**
     * Get tarea
     *
     * @return \ContadoresBundle\Entity\Tarea
     */
    public function getTarea()
    {
        return $this->tarea;
    }

    public function __toString(){
        return $this->nombre;
    }
}

