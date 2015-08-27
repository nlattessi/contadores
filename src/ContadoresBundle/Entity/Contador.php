<?php

namespace ContadoresBundle\Entity;

/**
 * Contador
 */
class Contador
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
    private $apellido;

    /**
     * @var string
     */
    private $celular;

    /**
     * @var string
     */
    private $mail;

    /**
     * @var string
     */
    private $telefono;

    /**
     * @var \ContadoresBundle\Entity\Usuario
     */
    private $usuario;

    /**
     * @var \ContadoresBundle\Entity\Area
     */
    private $area;


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
     * @return Contador
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
     * Set apellido
     *
     * @param string $apellido
     *
     * @return Contador
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get apellido
     *
     * @return string
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set celular
     *
     * @param string $celular
     *
     * @return Contador
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;

        return $this;
    }

    /**
     * Get celular
     *
     * @return string
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return Contador
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     *
     * @return Contador
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set usuario
     *
     * @param \ContadoresBundle\Entity\Usuario $usuario
     *
     * @return Contador
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


    /**
     * Get area
     *
     * @return \ContadoresBundle\Entity\Area
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * Set area
     *
     * @param \ContadoresBundle\Entity\Area $area
     *
     * @return Contador
     */
    public function setArea($area)
    {
        $this->area = $area;

        return $this;
    }

    public function __toString(){
        return $this->nombre . " " . $this->apellido;
    }

}
