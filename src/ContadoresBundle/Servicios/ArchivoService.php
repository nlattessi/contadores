<?php

namespace ContadoresBundle\Servicios;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Gaufrette\Filesystem;
use Doctrine\ORM\EntityManager;

use ContadoresBundle\Entity\Archivo;
use ContadoresBundle\Entity\ArchivoTarea;
use ContadoresBundle\Entity\ArchivoTareaMetadata;
use ContadoresBundle\Entity\ArchivoCliente;


class ArchivoService
{
    private $filesystem;
    private $em;

    public function __construct(Filesystem $filesystem, EntityManager $entityManager)
    {
        $this->filesystem = $filesystem;
        $this->em = $entityManager;
    }

    public function getFileById($id)
    {
        return $this->em->getRepository("ContadoresBundle:Archivo")->find($id);
    }

    public function createArchivoTarea(UploadedFile $file, $user, $tarea)
    {
        $filename = $this->createFile($file, 'tareas');

        $archivo = $this->newArchivo($file, $filename, $user);

        $archivoTarea = $this->newArchivoTarea($archivo, $tarea);

        return $archivoTarea;
    }

    public function createArchivoTareaMetadata(UploadedFile $file, $user, $tareaMetadata)
    {
        $filename = $this->createFile($file, 'tareasMetadata');

        $archivo = $this->newArchivo($file, $filename, $user);

        $archivoTareaMetadata = $this->newArchivoTareaMetadata($archivo, $tareaMetadata);

        return $archivoTareaMetadata;
    }

    public function createArchivoCliente(UploadedFile $file, $user, $cliente)
    {
        $filename = $this->createFile($file, 'clientes');

        $archivo = $this->newArchivo($file, $filename, $user);

        $archivoCliente = $this->newArchivoCliente($archivo, $cliente);

        return $archivoCliente;
    }

    private function createFile($file, $folder)
    {
        $filename = $this->getFilename($file, $folder);

        $adapter = $this->filesystem->getAdapter();
        $adapter->write($filename, file_get_contents($file->getPathname()));

        return $filename;
    }

    private function getFilename($file, $folder)
    {
        return sprintf('%s/%s%s%s_%s.%s',
            $folder,
            date('Y'), date('m'), date('d'), uniqid(),
            $file->getClientOriginalExtension()
        );
    }

    private function newArchivo($file, $filename, $user)
    {
        $archivo = new Archivo();
        $archivo->setNombre($file->getClientOriginalName());
        $archivo->setRuta($filename);
        $archivo->setUsuario($user);
        $archivo->setCreationTime(new \DateTime('now'));
        $archivo->setUpdateTime(new \DateTime('now'));
        $archivo->setFileSize($file->getClientSize());

        $this->em->persist($archivo);
        $this->em->flush();

        return $archivo;
    }

    private function newArchivoTarea($archivo, $tarea)
    {
        $archivoTarea = new ArchivoTarea();
        $archivoTarea->setArchivo($archivo);
        $archivoTarea->setTarea($tarea);
        $archivoTarea->setCreationTime(new \DateTime('now'));
        $archivoTarea->setUpdateTime(new \DateTime('now'));

        $this->em->persist($archivoTarea);
        $this->em->flush();

        return $archivoTarea;
    }

    private function newArchivoTareaMetadata($archivo, $tareaMetadata)
    {
        $archivoTareaMetadata = new ArchivoTareaMetadata();
        $archivoTareaMetadata->setArchivo($archivo);
        $archivoTareaMetadata->setTareaMetadata($tareaMetadata);
        $archivoTareaMetadata->setCreationTime(new \DateTime('now'));
        $archivoTareaMetadata->setUpdateTime(new \DateTime('now'));

        $this->em->persist($archivoTareaMetadata);
        $this->em->flush();

        return $archivoTareaMetadata;
    }

    private function newArchivoCliente($archivo, $cliente)
    {
        $archivoCliente = new ArchivoCliente();
        $archivoCliente->setArchivo($archivo);
        $archivoCliente->setCliente($cliente);
        $archivoCliente->setCreationTime(new \DateTime('now'));
        $archivoCliente->setUpdateTime(new \DateTime('now'));

        $this->em->persist($archivoCliente);
        $this->em->flush();

        return $archivoCliente;
    }
}
