<?php

namespace ContadoresBundle\Entity;

/**
 * Rol
 */
class Rol
{

    static $admin = 'ROLE_ADMIN';
    static $jefe = 'ROLE_JEFE';
    static $contador = 'ROLE_CONTADOR';
    static $cliente = 'ROLE_CLIENTE';
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nombre;

    public function setId($id)
    {
        $this->id = $id;
    }


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
     * @return Rol
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

    public function __toString(){
        return $this->nombre;
    }

}
