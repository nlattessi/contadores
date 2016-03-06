<?php

namespace ContadoresBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * TareaMetadata
 */
class TareaMetadata
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var boolean
     */
    private $esperiodica = false;

    /**
     * @var \ContadoresBundle\Entity\Rubro
     */
    private $rubro;

    /**
     * @var boolean
     */
    private $activo = true;

    private $archivos;

    private $tareas;


    public function __construct()
    {
        $this->archivos = new ArrayCollection();
        $this->tareas = new ArrayCollection();
    }

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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return TareaMetadata
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
     * Set esperiodica
     *
     * @param boolean $esperiodica
     *
     * @return TareaMetadata
     */
    public function setEsperiodica($esperiodica)
    {
        $this->esperiodica = $esperiodica;

        return $this;
    }

    /**
     * Get esperiodica
     *
     * @return boolean
     */
    public function getEsperiodica()
    {
        return $this->esperiodica;
    }

    /**
     * Set rubro
     *
     * @param \ContadoresBundle\Entity\Rubro $rubro
     *
     * @return TareaMetadata
     */
    public function setRubro(\ContadoresBundle\Entity\Rubro $rubro = null)
    {
        $this->rubro = $rubro;

        return $this;
    }

    /**
     * Get rubro
     *
     * @return \ContadoresBundle\Entity\Rubro
     */
    public function getRubro()
    {
        return $this->rubro;
    }

    /**
     * @return boolean
     */
    public function isActivo()
    {
        return $this->activo;
    }

    /**
     * @param boolean $activo
     */
    public function setActivo($activo)
    {
        $this->activo = $activo;
    }

    function __toString()
    {
        return $this->getNombre();
    }

    /**
     * @return ArrayCollection
     */
    public function getArchivos()
    {
        return $this->archivos;
    }

    /**
     * @param ArrayCollection $archivos
     */
    public function setArchivos($archivos)
    {
        $this->archivos = $archivos;
    }

    /**
     * @return ArrayCollection
     */
    public function getTareas()
    {
        return $this->tareas->filter(function($tarea) {
          return $tarea->isActivo() == true;
        });
    }

    /**
     * @param ArrayCollection $tareas
     */
    public function setTareas($tareas)
    {
        $this->tareas = $tareas;
    }
}
