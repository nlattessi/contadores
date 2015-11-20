<?php

namespace ContadoresBundle\Entity;

/**
 * Rubro
 */
class Rubro
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
     * @return Rubro
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
     * Set area
     *
     * @param \ContadoresBundle\Entity\Area $area
     *
     * @return Rubro
     */
    public function setArea(\ContadoresBundle\Entity\Area $area = null)
    {
        $this->area = $area;

        return $this;
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
}
