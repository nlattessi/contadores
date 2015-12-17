<?php

namespace Hera\ContadoresBundle\Entity;

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
     * @var \Hera\ContadoresBundle\Entity\Cliente
     */
    private $cliente;

    /**
     * @var \Hera\ContadoresBundle\Entity\Archivo
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
     * Set cliente
     *
     * @param \Hera\ContadoresBundle\Entity\Cliente $cliente
     *
     * @return ArchivoCliente
     */
    public function setCliente(\Hera\ContadoresBundle\Entity\Cliente $cliente = null)
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Get cliente
     *
     * @return \Hera\ContadoresBundle\Entity\Cliente
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Set archivo
     *
     * @param \Hera\ContadoresBundle\Entity\Archivo $archivo
     *
     * @return ArchivoCliente
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
}

