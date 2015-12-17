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
     * @var \ContadoresBundle\Entity\Rubro
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

    function __toString()
    {
        return $this->getNombre();
    }


}
