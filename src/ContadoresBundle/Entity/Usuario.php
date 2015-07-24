<?php

namespace ContadoresBundle\Entity;

/**
 * Usuario
 */
class Usuario
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $mail;

    /**
     * @var string
     */
    private $password;

    /**
     * @var integer
     */
    private $entidadId;

    /**
     * @var boolean
     */
    private $activo = true;

    /**
     * @var \ContadoresBundle\Entity\Rol
     */
    private $rol;


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
     * Set mail
     *
     * @param string $mail
     *
     * @return Usuario
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
     * Set password
     *
     * @param string $password
     *
     * @return Usuario
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set entidadId
     *
     * @param integer $entidadId
     *
     * @return Usuario
     */
    public function setEntidadId($entidadId)
    {
        $this->entidadId = $entidadId;

        return $this;
    }

    /**
     * Get entidadId
     *
     * @return integer
     */
    public function getEntidadId()
    {
        return $this->entidadId;
    }

    /**
     * Set activo
     *
     * @param boolean $activo
     *
     * @return Usuario
     */
    public function setActivo($activo)
    {
        $this->activo = $activo;

        return $this;
    }

    /**
     * Get activo
     *
     * @return boolean
     */
    public function getActivo()
    {
        return $this->activo;
    }

    /**
     * Set rol
     *
     * @param \ContadoresBundle\Entity\Rol $rol
     *
     * @return Usuario
     */
    public function setRol(\ContadoresBundle\Entity\Rol $rol = null)
    {
        $this->rol = $rol;

        return $this;
    }

    /**
     * Get rol
     *
     * @return \ContadoresBundle\Entity\Rol
     */
    public function getRol()
    {
        return $this->rol;
    }

    public function __toString(){
        return $this->mail;
    }
}
