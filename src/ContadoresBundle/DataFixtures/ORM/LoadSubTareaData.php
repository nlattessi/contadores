<?php

namespace ContadoresBundle\DataFixtures\ORM;

use \Doctrine\Common\DataFixtures\AbstractFixture;
use \Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use \Doctrine\Common\Persistence\ObjectManager;

use ContadoresBundle\Entity\SubTarea;

class LoadSubTareaData extends AbstractFixture implements OrderedFixtureInterface
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

        $subtarea = new SubTarea();
        $subtarea->setNombre('Impuestos uno');
        $subtarea->setFechaCreacion($dateNow);
        $subtarea->setEstadoActual(null);
        $subtarea->setFechaInicio($dateInicio);
        $subtarea->setFechaFin($dateFin);
        $subtarea->setTarea($this->getReference('tarea'));
        $this->addReference('subtarea', $subtarea);

        $dateNow = new \DateTime();
        $dateInicio = new \DateTime();
        $dateFin    = new \DateTime();
        $dateInicio->modify('+1 days');
        $dateFin->modify('+1 months');

        $subtarea2 = new SubTarea();
        $subtarea2->setNombre('Impuestos general');
        $subtarea2->setFechaCreacion($dateNow);
        $subtarea2->setEstadoActual(null);
        $subtarea2->setFechaInicio($dateInicio);
        $subtarea2->setFechaFin($dateFin);
        $subtarea2->setTarea($this->getReference('tarea1'));
        $this->addReference('subtarea2', $subtarea2);


        $dateNow = new \DateTime();
        $dateInicio = new \DateTime();
        $dateFin    = new \DateTime();
        $dateInicio->modify('+1 days');
        $dateFin->modify('+1 months');

        $subtarea3 = new SubTarea();
        $subtarea3->setNombre('cuentas');
        $subtarea3->setFechaCreacion($dateNow);
        $subtarea3->setEstadoActual(null);
        $subtarea3->setFechaInicio($dateInicio);
        $subtarea3->setFechaFin($dateFin);
        $subtarea3->setTarea($this->getReference('tarea2'));
        $this->addReference('subtarea3', $subtarea3);


        $dateNow = new \DateTime();
        $dateInicio = new \DateTime();
        $dateFin    = new \DateTime();
        $dateInicio->modify('+1 days');
        $dateFin->modify('+1 months');

        $subtarea4 = new SubTarea();
        $subtarea4->setNombre('bienes');
        $subtarea4->setFechaCreacion($dateNow);
        $subtarea4->setEstadoActual(null);
        $subtarea4->setFechaInicio($dateInicio);
        $subtarea4->setFechaFin($dateFin);
        $subtarea4->setTarea($this->getReference('tarea3'));
        $this->addReference('subtarea4', $subtarea4);

        $dateNow = new \DateTime();
        $dateInicio = new \DateTime();
        $dateFin    = new \DateTime();
        $dateInicio->modify('+1 days');
        $dateFin->modify('+1 months');

        $subtarea5 = new SubTarea();
        $subtarea5->setNombre('libro diario');
        $subtarea5->setFechaCreacion($dateNow);
        $subtarea5->setEstadoActual(null);
        $subtarea5->setFechaInicio($dateInicio);
        $subtarea5->setFechaFin($dateFin);
        $subtarea5->setTarea($this->getReference('tarea4'));
        $this->addReference('subtarea5', $subtarea5);

        $dateNow = new \DateTime();
        $dateInicio = new \DateTime();
        $dateFin    = new \DateTime();
        $dateInicio->modify('+1 days');
        $dateFin->modify('+1 months');

        $subtarea6 = new SubTarea();
        $subtarea6->setNombre('Debe');
        $subtarea6->setFechaCreacion($dateNow);
        $subtarea6->setEstadoActual(null);
        $subtarea6->setFechaInicio($dateInicio);
        $subtarea6->setFechaFin($dateFin);
        $subtarea6->setTarea($this->getReference('tarea5'));
        $this->addReference('subtarea6', $subtarea6);

        $dateNow = new \DateTime();
        $dateInicio = new \DateTime();
        $dateFin    = new \DateTime();
        $dateInicio->modify('+1 days');
        $dateFin->modify('+1 months');

        $subtarea7 = new SubTarea();
        $subtarea7->setNombre('Pasivo');
        $subtarea7->setFechaCreacion($dateNow);
        $subtarea7->setEstadoActual(null);
        $subtarea7->setFechaInicio($dateInicio);
        $subtarea7->setFechaFin($dateFin);
        $subtarea7->setTarea($this->getReference('tarea6'));
        $this->addReference('subtarea7', $subtarea7);

        $dateNow = new \DateTime();
        $dateInicio = new \DateTime();
        $dateFin    = new \DateTime();
        $dateInicio->modify('+1 days');
        $dateFin->modify('+1 months');

        $subtarea8 = new SubTarea();
        $subtarea8->setNombre('Activo');
        $subtarea8->setFechaCreacion($dateNow);
        $subtarea8->setEstadoActual(null);
        $subtarea8->setFechaInicio($dateInicio);
        $subtarea8->setFechaFin($dateFin);
        $subtarea8->setTarea($this->getReference('tarea7'));
        $this->addReference('subtarea8', $subtarea8);


        $manager->persist($subtarea);
        $manager->persist($subtarea2);
        $manager->persist($subtarea3);
        $manager->persist($subtarea4);
        $manager->persist($subtarea5);
        $manager->persist($subtarea6);
        $manager->persist($subtarea7);
        $manager->persist($subtarea8);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 12;
    }
}
