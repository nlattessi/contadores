<?php

namespace ContadoresBundle\Entity;

/**
 * ArchivoCliente
 */
class ArchivoCliente
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
     * @var \ContadoresBundle\Entity\Cliente
     */
    private $cliente;

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
     * @return ArchivoCliente
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
     * Set cliente
     *
     * @param \ContadoresBundle\Entity\Cliente $cliente
     *
     * @return ArchivoCliente
     */
    public function setCliente(\ContadoresBundle\Entity\Cliente $cliente = null)
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Get cliente
     *
     * @return \ContadoresBundle\Entity\Cliente
     */
    public function getCliente()
    {
        return $this->cliente;
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
