<?php

namespace Hera\ContadoresBundle\Entity;

/**
 * ArchivoTareaMetadata
 */
class ArchivoTareaMetadata
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
     * @var string
     */
    private $ruta;

    /**
     * @var \Hera\ContadoresBundle\Entity\TareaMetadata
     */
    private $tareaMetadata;

    /**
     * @var \Hera\ContadoresBundle\Entity\Usuario
     */
    private $usuario;


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
     * @return ArchivoTareaMetadata
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
     * Set ruta
     *
     * @param string $ruta
     *
     * @return ArchivoTareaMetadata
     */
    public function setRuta($ruta)
    {
        $this->ruta = $ruta;

        return $this;
    }

    /**
     * Get ruta
     *
     * @return string
     */
    public function getRuta()
    {
        return $this->ruta;
    }

    /**
     * Set tareaMetadata
     *
     * @param \Hera\ContadoresBundle\Entity\TareaMetadata $tareaMetadata
     *
     * @return ArchivoTareaMetadata
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

    /**
     * Set usuario
     *
     * @param \Hera\ContadoresBundle\Entity\Usuario $usuario
     *
     * @return ArchivoTareaMetadata
     */
    public function setUsuario(\Hera\ContadoresBundle\Entity\Usuario $usuario = null)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return \Hera\ContadoresBundle\Entity\Usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }
}
