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
        $dateInicio->modify('+2 days');
        $dateFin->modify('+2 months');

        $tarea = new Tarea();
        $tarea->setNombre('Impuestos Empresas');
        $tarea->setCliente($this->getReference('cliente1'));
        $tarea->setContador($this->getReference('contador1'));
        $tarea->setEstadoActual(null);
        $tarea->setFechaCreacion($dateNow);
        $tarea->setEstadoActual(null);
        $tarea->setFechaInicio($dateInicio);
//        $tarea->setFechaFin($dateFin);
        $tarea->setSubTareas(null);
        $tarea->setTareaMetadata($this->getReference('tareaMetadata1'));
        $this->addReference('tarea', $tarea);


        $dateNow = new \DateTime();
        $dateInicio = new \DateTime();
        $dateFin    = new \DateTime();
        $dateInicio->modify('+1 days');
        $dateFin->modify('+10 days');

        $tarea1 = new Tarea();
        $tarea1->setNombre('ART');
        $tarea1->setCliente($this->getReference('cliente1'));
        $tarea1->setContador($this->getReference('contador1'));
        $tarea1->setEstadoActual(null);
        $tarea1->setFechaCreacion($dateNow);
        $tarea1->setEstadoActual(null);
        $tarea1->setFechaInicio($dateInicio);
//        $tarea1->setFechaFin($dateFin);
        $tarea1->setSubTareas(null);
        $tarea1->setTareaMetadata($this->getReference('tareaMetadata1'));
        $this->addReference('tarea1', $tarea1);


        $dateNow = new \DateTime();
        $dateInicio = new \DateTime();
        $dateFin    = new \DateTime();
        $dateInicio->modify('+12 days');
        $dateFin->modify('+10 months');

        $tarea2 = new Tarea();
        $tarea2->setNombre('Bienes Personales');
        $tarea2->setCliente($this->getReference('cliente1'));
        $tarea2->setContador($this->getReference('contador1'));
        $tarea2->setEstadoActual(null);
        $tarea2->setFechaCreacion($dateNow);
        $tarea2->setEstadoActual(null);
        $tarea2->setFechaInicio($dateInicio);
//        $tarea2->setFechaFin($dateFin);
        $tarea2->setSubTareas(null);
        $tarea2->setTareaMetadata($this->getReference('tareaMetadata1'));
        $this->addReference('tarea2', $tarea2);


        //--------------------

        $dateNow = new \DateTime();
        $dateInicio = new \DateTime();
        $dateFin    = new \DateTime();
        $dateInicio->modify('+2 days');
        $dateFin->modify('+2 months');

        $tarea3 = new Tarea();
        $tarea3->setNombre('Impuestos Varios');
        $tarea3->setCliente($this->getReference('cliente1'));
        $tarea3->setContador($this->getReference('contador2'));
        $tarea3->setEstadoActual(null);
        $tarea3->setFechaCreacion($dateNow);
        $tarea3->setEstadoActual(null);
        $tarea3->setFechaInicio($dateInicio);
//        $tarea3->setFechaFin($dateFin);
        $tarea3->setSubTareas(null);
        $tarea3->setTareaMetadata($this->getReference('tareaMetadata2'));
        $this->addReference('tarea3', $tarea3);

        $dateNow = new \DateTime();
        $dateInicio = new \DateTime();
        $dateFin    = new \DateTime();
        $dateInicio->modify('+1 days');
        $dateFin->modify('+10 days');

        $tarea4 = new Tarea();
        $tarea4->setNombre('Ajuste de impuestos');
        $tarea4->setCliente($this->getReference('cliente1'));
        $tarea4->setContador($this->getReference('contador2'));
        $tarea4->setEstadoActual(null);
        $tarea4->setFechaCreacion($dateNow);
        $tarea4->setEstadoActual(null);
        $tarea4->setFechaInicio($dateInicio);
//        $tarea4->setFechaFin($dateFin);
        $tarea4->setSubTareas(null);
        $tarea4->setTareaMetadata($this->getReference('tareaMetadata2'));
        $this->addReference('tarea4', $tarea4);


        $dateNow = new \DateTime();
        $dateInicio = new \DateTime();
        $dateFin    = new \DateTime();
        $dateInicio->modify('+12 days');
        $dateFin->modify('+10 months');

        $tarea5 = new Tarea();
        $tarea5->setNombre('Firma de libros');
        $tarea5->setCliente($this->getReference('cliente1'));
        $tarea5->setContador($this->getReference('contador2'));
        $tarea5->setEstadoActual(null);
        $tarea5->setFechaCreacion($dateNow);
        $tarea5->setEstadoActual(null);
        $tarea5->setFechaInicio($dateInicio);
//        $tarea5->setFechaFin($dateFin);
        $tarea5->setSubTareas(null);
        $tarea5->setTareaMetadata($this->getReference('tareaMetadata1'));
        $this->addReference('tarea5', $tarea5);


        //--------------------

        $dateNow = new \DateTime();
        $dateInicio = new \DateTime();
        $dateFin    = new \DateTime();
        $dateInicio->modify('+2 days');
        $dateFin->modify('+2 months');

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
        $dateInicio->modify('+1 days');
        $dateFin->modify('+10 days');

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
        $dateInicio->modify('+12 days');
        $dateFin->modify('+10 months');

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
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 11;
    }
}
