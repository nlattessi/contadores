<?php

namespace ContadoresBundle\Entity;

/**
 * Archivo
 */
class Archivo
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
     * @var \ContadoresBundle\Entity\Usuario
     */
    private $usuario;

    private $creationTime;

    private $updateTime;

    private $fileSize;


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
     * @return Archivo
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
     * @return Archivo
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
     * Set usuario
     *
     * @param \ContadoresBundle\Entity\Usuario $usuario
     *
     * @return Archivo
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

    public function setCreationTime($creationTime)
    {
        $this->creationTime = $creationTime;

        return $this;
    }

    public function getCreationTime()
    {
        return $this->creationTime;
    }

    public function setUpdateTime($updateTime)
    {
        $this->updateTime = $updateTime;

        return $this;
    }

    public function getUpdateTime()
    {
        return $this->updateTime;
    }

    public function setFileSize($fileSize)
    {
        $this->fileSize = $fileSize;

        return $this;
    }

    public function getFileSize()
    {
        return $this->fileSize;
    }

    public function getAbsolutePath()
    {
        return null === $this->getRuta()
            ? null
            : $this->getUploadRootDir() . '/' . $this->getRuta();
    }

    public function getWebPath()
    {
        return null === $this->getRuta()
            ? null
            : $this->getUploadDir() . '/' . $this->getRuta();
    }

    public function getSize()
    {
        return Herramientas::formatSizeUnits(filesize($this->getAbsolutePath()));
    }

    public function getFileName()
    {
        return substr(substr($this->getRuta(), strpos($this->getRuta(), '/')), 1);
    }

    private function getUploadRootDir()
    {
        return __DIR__ . '/../../../app/data/' . $this->getUploadDir();
    }

    private function getUploadDir()
    {
        return 'bundles/contadores/uploads/archivos';
    }
}
