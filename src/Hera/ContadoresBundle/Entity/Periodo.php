<?php

namespace Hera\ContadoresBundle\Entity;

/**
 * Periodo
 */
class Periodo
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
     * @var \DateTime
     */
    private $fechaDesde;

    /**
     * @var \DateTime
     */
    private $fechaHasta;

    /**
     * @var \Hera\ContadoresBundle\Entity\Esquema
     */
    private $esquema;


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
     * @return Periodo
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
     * Set fechaDesde
     *
     * @param \DateTime $fechaDesde
     *
     * @return Periodo
     */
    public function setFechaDesde($fechaDesde)
    {
        $this->fechaDesde = $fechaDesde;

        return $this;
    }

    /**
     * Get fechaDesde
     *
     * @return \DateTime
     */
    public function getFechaDesde()
    {
        return $this->fechaDesde;
    }

    /**
     * Set fechaHasta
     *
     * @param \DateTime $fechaHasta
     *
     * @return Periodo
     */
    public function setFechaHasta($fechaHasta)
    {
        $this->fechaHasta = $fechaHasta;

        return $this;
    }

    /**
     * Get fechaHasta
     *
     * @return \DateTime
     */
    public function getFechaHasta()
    {
        return $this->fechaHasta;
    }

    /**
     * Set esquema
     *
     * @param \Hera\ContadoresBundle\Entity\Esquema $esquema
     *
     * @return Periodo
     */
    public function setEsquema(\Hera\ContadoresBundle\Entity\Esquema $esquema = null)
    {
        $this->esquema = $esquema;

        return $this;
    }

    /**
     * Get esquema
     *
     * @return \Hera\ContadoresBundle\Entity\Esquema
     */
    public function getEsquema()
    {
        return $this->esquema;
    }
}

