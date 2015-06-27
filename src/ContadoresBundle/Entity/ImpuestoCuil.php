<?php

namespace ContadoresBundle\Entity;

/**
 * ImpuestoCuil
 */
class ImpuestoCuil
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $cuil;

    /**
     * @var string
     */
    private $mes;

    /**
     * @var \DateTime
     */
    private $fecha;

    /**
     * @var \ContadoresBundle\Entity\Impuesto
     */
    private $impuesto;


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
     * Set cuil
     *
     * @param integer $cuil
     *
     * @return ImpuestoCuil
     */
    public function setCuil($cuil)
    {
        $this->cuil = $cuil;

        return $this;
    }

    /**
     * Get cuil
     *
     * @return integer
     */
    public function getCuil()
    {
        return $this->cuil;
    }

    /**
     * Set mes
     *
     * @param string $mes
     *
     * @return ImpuestoCuil
     */
    public function setMes($mes)
    {
        $this->mes = $mes;

        return $this;
    }

    /**
     * Get mes
     *
     * @return string
     */
    public function getMes()
    {
        return $this->mes;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return ImpuestoCuil
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
     * Set impuesto
     *
     * @param \ContadoresBundle\Entity\Impuesto $impuesto
     *
     * @return ImpuestoCuil
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
}
