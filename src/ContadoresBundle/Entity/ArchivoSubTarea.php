<?php

namespace ContadoresBundle\Entity;

/**
 * ArchivoSubTarea
 */
class ArchivoSubTarea
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
     * @var \ContadoresBundle\Entity\SubTarea
     */
    private $subTarea;

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
     * @return ArchivoSubTarea
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
     * @return ArchivoSubTarea
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
     * Set subTarea
     *
     * @param \ContadoresBundle\Entity\SubTarea $subTarea
     *
     * @return ArchivoSubTarea
     */
    public function setSubTarea(\ContadoresBundle\Entity\SubTarea $subTarea = null)
    {
        $this->subTarea = $subTarea;

        return $this;
    }

    /**
     * Get subTarea
     *
     * @return \ContadoresBundle\Entity\SubTarea
     */
    public function getSubTarea()
    {
        return $this->subTarea;
    }

    /**
     * Set usuario
     *
     * @param \ContadoresBundle\Entity\Usuario $usuario
     *
     * @return ArchivoSubTarea
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
