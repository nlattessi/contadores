<?php

namespace ContadoresBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
/**
 * Tarea
 */
class Tarea
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $fechaInicio;

    /**
     * @var \DateTime
     */
    private $fechaFin;

    /**
     * @var \DateTime
     */
    private $fechaCreacion;

    /**
     * @var \DateTime
     */
    private $vencimientoFiscal;

    /**
     * @var \DateTime
     */
    private $vencimientoInterno;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var integer
     */
    private $tiempoEstimado;

    /**
     * @var \DateTime
     */
    private $fechaBaja;

    /**
     * @var \ContadoresBundle\Entity\Cliente
     */
    private $cliente;

    /**
     * @var \ContadoresBundle\Entity\Contador
     */
    private $contador;

    /**
     * @var \ContadoresBundle\Entity\EstadoTarea
     */
    private $estadoActual;

    /**
     * @var \ContadoresBundle\Entity\TareaMetadata
     */
    private $tareaMetadata;

    /**
     * @ORM\OneToMany(targetEntity="Observacion", mappedBy="tarea", cascade={"remove"})
     */
    protected $observaciones;

    public function __construct()
    {
        $this->observaciones = new ArrayCollection();
    }

    public function addObservacion(Observacion $e)
    {
        $this->observaciones[] = $e;
        $e->setTarea($this);

        return $this;
    }

    public function getObservaciones()
    {
        return $this->observaciones;
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
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     *
     * @return Tarea
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;

        return $this;
    }

    /**
     * Get fechaInicio
     *
     * @return \DateTime
     */
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    /**
     * Set fechaFin
     *
     * @param \DateTime $fechaFin
     *
     * @return Tarea
     */
    public function setFechaFin($fechaFin)
    {
        $this->fechaFin = $fechaFin;

        return $this;
    }

    /**
     * Get fechaFin
     *
     * @return \DateTime
     */
    public function getFechaFin()
    {
        return $this->fechaFin;
    }

    /**
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     *
     * @return Tarea
     */
    public function setFechaCreacion($fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;

        return $this;
    }

    /**
     * Get fechaCreacion
     *
     * @return \DateTime
     */
    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }

    /**
     * Set vencimientoFiscal
     *
     * @param \DateTime $vencimientoFiscal
     *
     * @return Tarea
     */
    public function setVencimientoFiscal($vencimientoFiscal)
    {
        $this->vencimientoFiscal = $vencimientoFiscal;

        return $this;
    }

    /**
     * Get vencimientoFiscal
     *
     * @return \DateTime
     */
    public function getVencimientoFiscal()
    {
        return $this->vencimientoFiscal;
    }

    /**
     * Set vencimientoInterno
     *
     * @param \DateTime $vencimientoInterno
     *
     * @return Tarea
     */
    public function setVencimientoInterno($vencimientoInterno)
    {
        $this->vencimientoInterno = $vencimientoInterno;

        return $this;
    }

    /**
     * Get vencimientoInterno
     *
     * @return \DateTime
     */
    public function getVencimientoInterno()
    {
        return $this->vencimientoInterno;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Tarea
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
     * Set tiempoEstimado
     *
     * @param integer $tiempoEstimado
     *
     * @return Tarea
     */
    public function setTiempoEstimado($tiempoEstimado)
    {
        $this->tiempoEstimado = $tiempoEstimado;

        return $this;
    }

    /**
     * Get tiempoEstimado
     *
     * @return integer
     */
    public function getTiempoEstimado()
    {
        return $this->tiempoEstimado;
    }

    /**
     * Set fechaBaja
     *
     * @param \DateTime $fechaBaja
     *
     * @return Tarea
     */
    public function setFechaBaja($fechaBaja)
    {
        $this->fechaBaja = $fechaBaja;

        return $this;
    }

    /**
     * Get fechaBaja
     *
     * @return \DateTime
     */
    public function getFechaBaja()
    {
        return $this->fechaBaja;
    }

    /**
     * Set cliente
     *
     * @param \ContadoresBundle\Entity\Cliente $cliente
     *
     * @return Tarea
     */
    public function setCliente(\ContadoresBundle\Entity\Cliente $cliente = null)
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Get cliente
     *
     * @return \ContadoresBundle\Entity\Cliente
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Set contador
     *
     * @param \ContadoresBundle\Entity\Contador $contador
     *
     * @return Tarea
     */
    public function setContador(\ContadoresBundle\Entity\Contador $contador = null)
    {
        $this->contador = $contador;

        return $this;
    }

    /**
     * Get contador
     *
     * @return \ContadoresBundle\Entity\Contador
     */
    public function getContador()
    {
        return $this->contador;
    }

    /**
     * Set estadoActual
     *
     * @param \ContadoresBundle\Entity\EstadoTarea $estadoActual
     *
     * @return Tarea
     */
    public function setEstadoActual(\ContadoresBundle\Entity\EstadoTarea $estadoActual = null)
    {
        $this->estadoActual = $estadoActual;

        return $this;
    }

    /**
     * Get estadoActual
     *
     * @return \ContadoresBundle\Entity\EstadoTarea
     */
    public function getEstadoActual()
    {
        return $this->estadoActual;
    }

    /**
     * Set tareaMetadata
     *
     * @param \ContadoresBundle\Entity\TareaMetadata $tareaMetadata
     *
     * @return Tarea
     */
    public function setTareaMetadata(\ContadoresBundle\Entity\TareaMetadata $tareaMetadata = null)
    {
        $this->tareaMetadata = $tareaMetadata;

        return $this;
    }

    /**
     * Get tareaMetadata
     *
     * @return \ContadoresBundle\Entity\TareaMetadata
     */
    public function getTareaMetadata()
    {
        return $this->tareaMetadata;
    }

    function __toString()
    {
        return $this->getNombre();
    }


}
