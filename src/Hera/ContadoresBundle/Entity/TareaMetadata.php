<?php

namespace Hera\ContadoresBundle\Entity;

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
    private $esperiodica = '0';

    /**
     * @var \Hera\ContadoresBundle\Entity\Rubro
     */
    private $rubro;


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
     * @param \Hera\ContadoresBundle\Entity\Rubro $rubro
     *
     * @return TareaMetadata
     */
    public function setRubro(\Hera\ContadoresBundle\Entity\Rubro $rubro = null)
    {
        $this->rubro = $rubro;

        return $this;
    }

    /**
     * Get rubro
     *
     * @return \Hera\ContadoresBundle\Entity\Rubro
     */
    public function getRubro()
    {
        return $this->rubro;
    }
}
