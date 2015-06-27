<?php

namespace ContadoresBundle\Entity;

/**
 * ArchivoSubTareaMetadata
 */
class ArchivoSubTareaMetadata
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
     * @var \ContadoresBundle\Entity\SubTareaMetadata
     */
    private $subTareaMetadata;

    /**
     * @var \ContadoresBundle\Entity\Usuario
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
     * @return ArchivoSubTareaMetadata
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
     * @return ArchivoSubTareaMetadata
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
     * Set subTareaMetadata
     *
     * @param \ContadoresBundle\Entity\SubTareaMetadata $subTareaMetadata
     *
     * @return ArchivoSubTareaMetadata
     */
    public function setSubTareaMetadata(\ContadoresBundle\Entity\SubTareaMetadata $subTareaMetadata = null)
    {
        $this->subTareaMetadata = $subTareaMetadata;

        return $this;
    }

    /**
     * Get subTareaMetadata
     *
     * @return \ContadoresBundle\Entity\SubTareaMetadata
     */
    public function getSubTareaMetadata()
    {
        return $this->subTareaMetadata;
    }

    /**
     * Set usuario
     *
     * @param \ContadoresBundle\Entity\Usuario $usuario
     *
     * @return ArchivoSubTareaMetadata
     */
    public function setUsuario(\ContadoresBundle\Entity\Usuario $usuario = null)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return \ContadoresBundle\Entity\Usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }
}
