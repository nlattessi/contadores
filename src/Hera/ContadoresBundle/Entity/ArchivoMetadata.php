<?php

namespace Hera\ContadoresBundle\Entity;

/**
 * ArchivoMetadata
 */
class ArchivoMetadata
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Hera\ContadoresBundle\Entity\Archivo
     */
    private $archivo;

    /**
     * @var \Hera\ContadoresBundle\Entity\TareaMetadata
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
     * Set archivo
     *
     * @param \Hera\ContadoresBundle\Entity\Archivo $archivo
     *
     * @return ArchivoMetadata
     */
    public function setArchivo(\Hera\ContadoresBundle\Entity\Archivo $archivo = null)
    {
        $this->archivo = $archivo;

        return $this;
    }

    /**
     * Get archivo
     *
     * @return \Hera\ContadoresBundle\Entity\Archivo
     */
    public function getArchivo()
    {
        return $this->archivo;
    }

    /**
     * Set tareaMetadata
     *
     * @param \Hera\ContadoresBundle\Entity\TareaMetadata $tareaMetadata
     *
     * @return ArchivoMetadata
     */
    public function setTareaMetadata(\Hera\ContadoresBundle\Entity\TareaMetadata $tareaMetadata = null)
    {
        $this->tareaMetadata = $tareaMetadata;

        return $this;
    }

    /**
     * Get tareaMetadata
     *
     * @return \Hera\ContadoresBundle\Entity\TareaMetadata
     */
    public function getTareaMetadata()
    {
        return $this->tareaMetadata;
    }
}

