<?php

namespace ContadoresBundle\Entity;

/**
 * SubTareaMetadata
 */
class SubTareaMetadata
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
     * @var integer
     */
    private $tiempoEstimado = '0';

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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return SubTareaMetadata
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
     * Set tiempoEstimado
     *
     * @param integer $tiempoEstimado
     *
     * @return SubTareaMetadata
     */
    public function setTiempoEstimado($tiempoEstimado)
    {
        $this->tiempoEstimado = $tiempoEstimado;

        return $this;
    }

    /**
     * Get tiempoEstimado
     *
     * @return integer
     */
    public function getTiempoEstimado()
    {
        return $this->tiempoEstimado;
    }

    /**
     * Set tareaMetadata
     *
     * @param \ContadoresBundle\Entity\TareaMetadata $tareaMetadata
     *
     * @return SubTareaMetadata
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

    public function __toString(){
        return $this->nombre;
    }
}
