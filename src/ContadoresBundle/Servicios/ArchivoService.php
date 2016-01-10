<?php

namespace ContadoresBundle\Servicios;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Gaufrette\Filesystem;
use Doctrine\ORM\EntityManager;

use ContadoresBundle\Entity\Archivo;
use ContadoresBundle\Entity\ArchivoTarea;


class ArchivoService
{
    private $filesystem;
    private $em;

    public function __construct(Filesystem $filesystem, EntityManager $entityManager)
    {
        $this->filesystem = $filesystem;
        $this->em = $entityManager;
    }

    public function createArchivoTarea(UploadedFile $file, $user, $tarea)
    {
        $filename = $this->createFile($file, 'tareas');

        $archivo = $this->newArchivo($file, $filename, $user);

        $archivoTarea = $this->newArchivoTarea($archivo, $tarea);

        return $archivoTarea;
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
}
