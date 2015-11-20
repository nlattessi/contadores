<?php

namespace ContadoresBundle\Entity;

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
     * @var \ContadoresBundle\Entity\TareaMetadata
     */
    private $tareaMetadata;

    /**
     * @var \ContadoresBundle\Entity\Archivo
     */
    private $archivo;


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
     * Set tareaMetadata
     *
     * @param \ContadoresBundle\Entity\TareaMetadata $tareaMetadata
     *
     * @return ArchivoMetadata
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

    /**
     * Set archivo
     *
     * @param \ContadoresBundle\Entity\Archivo $archivo
     *
     * @return ArchivoMetadata
     */
    public function setArchivo(\ContadoresBundle\Entity\Archivo $archivo = null)
    {
        $this->archivo = $archivo;

        return $this;
    }

    /**
     * Get archivo
     *
     * @return \ContadoresBundle\Entity\Archivo
     */
    public function getArchivo()
    {
        return $this->archivo;
    }
}

