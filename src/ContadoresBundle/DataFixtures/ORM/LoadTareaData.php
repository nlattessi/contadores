<?php

namespace ContadoresBundle\DataFixtures\ORM;

use \Doctrine\Common\DataFixtures\AbstractFixture;
use \Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use \Doctrine\Common\Persistence\ObjectManager;

use ContadoresBundle\Entity\Tarea;

class LoadTareaData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $dateNow = new \DateTime();
        $dateInicio = new \DateTime();
        $dateFin    = new \DateTime();
        $dateInicio->add(new \DateInterval('P2D'));
        $dateFin->add(new \DateInterval('P2M'));

        $tarea = new Tarea();
        $tarea->setNombre('Impuestos Empresas');
        $tarea->setCliente($this->getReference('cliente1'));
        $tarea->setContador($this->getReference('contador1'));
        $tarea->setEstadoActual(null);
        $tarea->setFechaCreacion($dateNow);
        $tarea->setEstadoActual(null);
        $tarea->setFechaInicio($dateInicio);
        $tarea->setVencimientoInterno($dateFin);
        $tarea->setSubTareas(null);
        $tarea->setTareaMetadata($this->getReference('tareaMetadata1'));
        $this->addReference('tarea', $tarea);


        $dateNow = new \DateTime();
        $dateInicio = new \DateTime();
        $dateFin    = new \DateTime();
        $dateInicio->add(new \DateInterval('P1D'));
        $dateFin->add(new \DateInterval('P6D'));

        $tarea1 = new Tarea();
        $tarea1->setNombre('ART');
        $tarea1->setCliente($this->getReference('cliente1'));
        $tarea1->setContador($this->getReference('contador1'));
        $tarea1->setEstadoActual(null);
        $tarea1->setFechaCreacion($dateNow);
        $tarea1->setEstadoActual(null);
        $tarea1->setFechaInicio($dateInicio);
        $tarea1->setVencimientoInterno($dateFin);
        $tarea1->setSubTareas(null);
        $tarea1->setTareaMetadata($this->getReference('tareaMetadata1'));
        $this->addReference('tarea1', $tarea1);


        $dateNow = new \DateTime();
        $dateInicio = new \DateTime();
        $dateFin    = new \DateTime();
        $dateInicio->add(new \DateInterval('P12D'));
        $dateFin->add(new \DateInterval('P10M'));

        $tarea2 = new Tarea();
        $tarea2->setNombre('Bienes Personales');
        $tarea2->setCliente($this->getReference('cliente1'));
        $tarea2->setContador($this->getReference('contador1'));
        $tarea2->setEstadoActual(null);
        $tarea2->setFechaCreacion($dateNow);
        $tarea2->setEstadoActual(null);
        $tarea2->setFechaInicio($dateInicio);
        $tarea2->setVencimientoInterno($dateFin);
        $tarea2->setSubTareas(null);
        $tarea2->setTareaMetadata($this->getReference('tareaMetadata1'));
        $this->addReference('tarea2', $tarea2);


        //--------------------

        $dateNow = new \DateTime();
        $dateInicio = new \DateTime();
        $dateFin    = new \DateTime();
        $dateInicio->add(new \DateInterval('P2D'));
        $dateFin->add(new \DateInterval('P2M'));

        $tarea3 = new Tarea();
        $tarea3->setNombre('Impuestos Varios');
        $tarea3->setCliente($this->getReference('cliente1'));
        $tarea3->setContador($this->getReference('contador2'));
        $tarea3->setEstadoActual(null);
        $tarea3->setFechaCreacion($dateNow);
        $tarea3->setEstadoActual(null);
        $tarea3->setFechaInicio($dateInicio);
        $tarea3->setVencimientoInterno($dateFin);
        $tarea3->setSubTareas(null);
        $tarea3->setTareaMetadata($this->getReference('tareaMetadata2'));
        $this->addReference('tarea3', $tarea3);

        $dateNow = new \DateTime();
        $dateInicio = new \DateTime();
        $dateFin    = new \DateTime();
        $dateInicio->add(new \DateInterval('P1D'));
        $dateFin->add(new \DateInterval('P4D'));

        $tarea4 = new Tarea();
        $tarea4->setNombre('Ajuste de impuestos');
        $tarea4->setCliente($this->getReference('cliente1'));
        $tarea4->setContador($this->getReference('contador2'));
        $tarea4->setEstadoActual(null);
        $tarea4->setFechaCreacion($dateNow);
        $tarea4->setEstadoActual(null);
        $tarea4->setFechaInicio($dateInicio);
        $tarea4->setVencimientoInterno($dateFin);
        $tarea4->setSubTareas(null);
        $tarea4->setTareaMetadata($this->getReference('tareaMetadata2'));
        $this->addReference('tarea4', $tarea4);


        $dateNow = new \DateTime();
        $dateInicio = new \DateTime();
        $dateFin    = new \DateTime();
        $dateInicio->add(new \DateInterval('P12D'));
        $dateFin->add(new \DateInterval('P10M'));

        $tarea5 = new Tarea();
        $tarea5->setNombre('Firma de libros');
        $tarea5->setCliente($this->getReference('cliente1'));
        $tarea5->setContador($this->getReference('contador2'));
        $tarea5->setEstadoActual(null);
        $tarea5->setFechaCreacion($dateNow);
        $tarea5->setEstadoActual(null);
        $tarea5->setFechaInicio($dateInicio);
        $tarea5->setVencimientoInterno($dateFin);
        $tarea5->setSubTareas(null);
        $tarea5->setTareaMetadata($this->getReference('tareaMetadata1'));
        $this->addReference('tarea5', $tarea5);


        //--------------------

        $dateNow = new \DateTime();
        $dateInicio = new \DateTime();
        $dateFin    = new \DateTime();
        $dateInicio->add(new \DateInterval('P2D'));
        $dateFin->add(new \DateInterval('P2M'));

        $tarea6 = new Tarea();
        $tarea6->setNombre('Presentar Impuestos');
        $tarea6->setCliente($this->getReference('cliente2'));
        $tarea6->setContador($this->getReference('contador1'));
        $tarea6->setEstadoActual(null);
        $tarea6->setFechaCreacion($dateNow);
        $tarea6->setEstadoActual(null);
        $tarea6->setFechaInicio($dateInicio);
        $tarea6->setFechaFin($dateFin);
        $tarea6->setSubTareas(null);
        $tarea6->setTareaMetadata($this->getReference('tareaMetadata3'));
        $this->addReference('tarea6', $tarea6);

        $dateNow = new \DateTime();
        $dateInicio = new \DateTime();
        $dateFin    = new \DateTime();
        $dateInicio->add(new \DateInterval('P1D'));
        $dateFin->add(new \DateInterval('P3D'));

        $tarea7 = new Tarea();
        $tarea7->setNombre('Afip');
        $tarea7->setCliente($this->getReference('cliente2'));
        $tarea7->setContador($this->getReference('contador1'));
        $tarea7->setEstadoActual(null);
        $tarea7->setFechaCreacion($dateNow);
        $tarea7->setEstadoActual(null);
        $tarea7->setFechaInicio($dateInicio);
        $tarea7->setFechaFin($dateFin);
        $tarea7->setSubTareas(null);
        $tarea7->setTareaMetadata($this->getReference('tareaMetadata3'));
        $this->addReference('tarea7', $tarea7);


        $dateNow = new \DateTime();
        $dateInicio = new \DateTime();
        $dateFin    = new \DateTime();
        $dateInicio->add(new \DateInterval('P12D'));
        $dateFin->add(new \DateInterval('P10M'));

        $tarea8 = new Tarea();
        $tarea8->setNombre('Ajuste de libro general');
        $tarea8->setCliente($this->getReference('cliente2'));
        $tarea8->setContador($this->getReference('contador1'));
        $tarea8->setEstadoActual(null);
        $tarea8->setFechaCreacion($dateNow);
        $tarea8->setEstadoActual(null);
        $tarea8->setFechaInicio($dateInicio);
        $tarea8->setFechaFin($dateFin);
        $tarea8->setSubTareas(null);
        $tarea8->setTareaMetadata($this->getReference('tareaMetadata3'));
        $this->addReference('tarea8', $tarea8);



        $manager->persist($tarea);
        $manager->persist($tarea1);
        $manager->persist($tarea2);
        $manager->persist($tarea3);
        $manager->persist($tarea4);
        $manager->persist($tarea5);
        $manager->persist($tarea6);
        $manager->persist($tarea7);
        $manager->persist($tarea8);

        $manager->flush();

        $this->getReference('estadoTarea1')->setTarea($this->getReference('tarea'));
        $this->getReference('estadoTarea2')->setTarea($this->getReference('tarea1'));
        $this->getReference('estadoTarea3')->setTarea($this->getReference('tarea2'));
        $this->getReference('estadoTarea4')->setTarea($this->getReference('tarea3'));
        $this->getReference('estadoTarea5')->setTarea($this->getReference('tarea4'));
        $this->getReference('estadoTarea6')->setTarea($this->getReference('tarea5'));
        $this->getReference('estadoTarea7')->setTarea($this->getReference('tarea6'));
        $this->getReference('estadoTarea8')->setTarea($this->getReference('tarea7'));
        $this->getReference('estadoTarea9')->setTarea($this->getReference('tarea8'));
        $manager->persist($this->getReference('estadoTarea1'));
        $manager->persist($this->getReference('estadoTarea2'));
        $manager->persist($this->getReference('estadoTarea3'));
        $manager->persist($this->getReference('estadoTarea4'));
        $manager->persist($this->getReference('estadoTarea5'));
        $manager->persist($this->getReference('estadoTarea6'));
        $manager->persist($this->getReference('estadoTarea7'));
        $manager->persist($this->getReference('estadoTarea9'));
        $manager->flush();

        $this->getReference('tarea')->setEstadoActual($this->getReference('estadoTarea1'));
        $this->getReference('tarea1')->setEstadoActual($this->getReference('estadoTarea2'));
        $this->getReference('tarea2')->setEstadoActual($this->getReference('estadoTarea3'));
        $this->getReference('tarea3')->setEstadoActual($this->getReference('estadoTarea4'));
        $this->getReference('tarea4')->setEstadoActual($this->getReference('estadoTarea5'));
        $this->getReference('tarea5')->setEstadoActual($this->getReference('estadoTarea6'));
        $this->getReference('tarea6')->setEstadoActual($this->getReference('estadoTarea7'));
        $this->getReference('tarea7')->setEstadoActual($this->getReference('estadoTarea8'));
        $this->getReference('tarea8')->setEstadoActual($this->getReference('estadoTarea9'));
        $manager->persist($this->getReference('tarea'));
        $manager->persist($this->getReference('tarea2'));
        $manager->persist($this->getReference('tarea3'));
        $manager->persist($this->getReference('tarea4'));
        $manager->persist($this->getReference('tarea5'));
        $manager->persist($this->getReference('tarea6'));
        $manager->persist($this->getReference('tarea7'));
        $manager->persist($this->getReference('tarea8'));
        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 13;
    }
}
