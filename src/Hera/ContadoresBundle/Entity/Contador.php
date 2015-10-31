<?php

namespace Hera\ContadoresBundle\Entity;

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
     * @var boolean
     */
    private $esJefe = '0';

    /**
     * @var \Hera\ContadoresBundle\Entity\Area
     */
    private $area;

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
     * Set esJefe
     *
     * @param boolean $esJefe
     *
     * @return Contador
     */
    public function setEsJefe($esJefe)
    {
        $this->esJefe = $esJefe;

        return $this;
    }

    /**
     * Get esJefe
     *
     * @return boolean
     */
    public function getEsJefe()
    {
        return $this->esJefe;
    }

    /**
     * Set area
     *
     * @param \Hera\ContadoresBundle\Entity\Area $area
     *
     * @return Contador
     */
    public function setArea(\Hera\ContadoresBundle\Entity\Area $area = null)
    {
        $this->area = $area;

        return $this;
    }

    /**
     * Get area
     *
     * @return \Hera\ContadoresBundle\Entity\Area
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * Set usuario
     *
     * @param \Hera\ContadoresBundle\Entity\Usuario $usuario
     *
     * @return Contador
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
