<?php

namespace ContadoresBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Area
 */
class Area
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
     * @ORM\OneToMany(targetEntity="Rubro", mappedBy="area", cascade={"remove"})
     */
    protected $rubros;

    public function __construct()
    {
        $this->rubros = new ArrayCollection();
    }

    public function addRubro(Rubro $e)
    {
        $this->rubros[] = $e;
        $e->setArea($this);

        return $this;
    }

    public function getRubros()
    {
        return $this->rubros;
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
     * @return Area
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
        return $this->getNombre();
    }

}
