<?php

namespace ContadoresBundle\Entity;

/**
 * Vencimiento
 */
class Vencimiento
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $fecha;

    /**
     * @var integer
     */
    private $periodoId;

    /**
     * @var string
     */
    private $colaCuil;

    /**
     * @var \ContadoresBundle\Entity\TareaMetadata
     */
    private $tareaMetadata;


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
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Vencimiento
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set periodoId
     *
     * @param integer $periodoId
     *
     * @return Vencimiento
     */
    public function setPeriodoId($periodoId)
    {
        $this->periodoId = $periodoId;

        return $this;
    }

    /**
     * Get periodoId
     *
     * @return integer
     */
    public function getPeriodoId()
    {
        return $this->periodoId;
    }

    /**
     * Set colaCuil
     *
     * @param string $colaCuil
     *
     * @return Vencimiento
     */
    public function setColaCuil($colaCuil)
    {
        $this->colaCuil = $colaCuil;

        return $this;
    }

    /**
     * Get colaCuil
     *
     * @return string
     */
    public function getColaCuil()
    {
        return $this->colaCuil;
    }

    /**
     * Set tareaMetadata
     *
     * @param \ContadoresBundle\Entity\TareaMetadata $tareaMetadata
     *
     * @return Vencimiento
     */
    public function setTareaMetadata(\ContadoresBundle\Entity\TareaMetadata $tareaMetadata = null)
    {
        $this->tareaMetadata = $tareaMetadata;

        return $this;
    }

    /**
     * Get tareaMetadata
     *
     * @return \ContadoresBundle\Entity\TareaMetadata
     */
    public function getTareaMetadata()
    {
        return $this->tareaMetadata;
    }
}
