<?php

namespace ContadoresBundle\Entity;

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
     * @var \ContadoresBundle\Entity\Impuesto
     */
    private $impuesto;

    /**
     * @var \ContadoresBundle\Entity\Area
     */
    private $area;


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
     * Set impuesto
     *
     * @param \ContadoresBundle\Entity\Impuesto $impuesto
     *
     * @return TareaMetadata
     */
    public function setImpuesto(\ContadoresBundle\Entity\Impuesto $impuesto = null)
    {
        $this->impuesto = $impuesto;

        return $this;
    }

    /**
     * Get impuesto
     *
     * @return \ContadoresBundle\Entity\Impuesto
     */
    public function getImpuesto()
    {
        return $this->impuesto;
    }

    /**
     * Set area
     *
     * @param \ContadoresBundle\Entity\Area $area
     *
     * @return TareaMetadata
     */
    public function setArea(\ContadoresBundle\Entity\Area $area = null)
    {
        $this->area = $area;

        return $this;
    }

    /**
     * Get area
     *
     * @return \ContadoresBundle\Entity\Area
     */
    public function getArea()
    {
        return $this->area;
    }
}

