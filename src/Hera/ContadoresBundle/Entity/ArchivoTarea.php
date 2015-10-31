<?php

namespace Hera\ContadoresBundle\Entity;

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
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $ruta;

    /**
     * @var \Hera\ContadoresBundle\Entity\Tarea
     */
    private $tarea;

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
     * @return ArchivoTarea
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
     * @return ArchivoTarea
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
     * Set tarea
     *
     * @param \Hera\ContadoresBundle\Entity\Tarea $tarea
     *
     * @return ArchivoTarea
     */
    public function setTarea(\Hera\ContadoresBundle\Entity\Tarea $tarea = null)
    {
        $this->tarea = $tarea;

        return $this;
    }

    /**
     * Get tarea
     *
     * @return \Hera\ContadoresBundle\Entity\Tarea
     */
    public function getTarea()
    {
        return $this->tarea;
    }

    /**
     * Set usuario
     *
     * @param \Hera\ContadoresBundle\Entity\Usuario $usuario
     *
     * @return ArchivoTarea
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

