<?php

namespace ContadoresBundle\Entity;
use ContadoresBundle\Utils\Herramientas;

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
     * @var \ContadoresBundle\Entity\Periodo
     */
    private $periodo;

    /**
     * @var string
     */
    private $colaCuil;

    /**
     * @var \ContadoresBundle\Entity\TareaMetadata
     */
    private $tareaMetadata;

    /**
     * @var \ContadoresBundle\Entity\Esquema
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
     * Set periodo
     *
     * @param \ContadoresBundle\Entity\Periodo $periodo
     *
     * @return Vencimiento
     */
    public function setPeriodo($periodo)
    {
        $this->periodo = $periodo;
        //$this->esquema = $periodo->getEsquema();
        return $this;
    }

    /**
     * Get periodo
     *
     * @return \ContadoresBundle\Entity\Periodo
     */
    public function getPeriodo()
    {
        return $this->periodo;
    }

    public function getEsquema(){
        if($this->esquema){
            return $this->esquema;
        }
        if($this->getPeriodo()){
            return $this->getPeriodo()->getEsquema();
        }
        return null;
    }

    public function setEsquema($esquema){

        $this->esquema = $esquema;
        return $this;
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

    function __toString()
    {
        return $this->getFecha()->format("d/m/Y");
    }


}

