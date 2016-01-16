<?php

namespace ContadoresBundle\Entity;

/**
 * ArchivoTarea
 */
class ArchivoTarea
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \ContadoresBundle\Entity\Archivo
     */
    private $archivo;

    /**
     * @var \ContadoresBundle\Entity\Tarea
     */
    private $tarea;

    private $creationTime;

    private $updateTime;


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
     * @param \ContadoresBundle\Entity\Archivo $archivo
     *
     * @return ArchivoTarea
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

    /**
     * Set tarea
     *
     * @param \ContadoresBundle\Entity\Tarea $tarea
     *
     * @return ArchivoTarea
     */
    public function setTarea(\ContadoresBundle\Entity\Tarea $tarea = null)
    {
        $this->tarea = $tarea;

        return $this;
    }

    /**
     * Get tarea
     *
     * @return \ContadoresBundle\Entity\Tarea
     */
    public function getTarea()
    {
        return $this->tarea;
    }

    public function setCreationTime($creationTime)
    {
        $this->creationTime = $creationTime;

        return $this;
    }

    public function getCreationTime()
    {
        return $this->creationTime;
    }

    public function setUpdateTime($updateTime)
    {
        $this->updateTime = $updateTime;

        return $this;
    }

    public function getUpdateTime()
    {
        return $this->updateTime;
    }
}
