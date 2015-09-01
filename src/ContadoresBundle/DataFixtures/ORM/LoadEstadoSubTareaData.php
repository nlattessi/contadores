<?php

namespace ContadoresBundle\DataFixtures\ORM;

use \Doctrine\Common\DataFixtures\AbstractFixture;
use \Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use \Doctrine\Common\Persistence\ObjectManager;

use ContadoresBundle\Entity\EstadoSubTarea;

class LoadEstadoSubTareaData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $dateInicio = new \DateTime();
        $dateFin    = new \DateTime();
        $dateInicio->modify('+2 days');
        $dateFin->modify('+2 months');

        $estadoSubTarea = new EstadoSubTarea();
        $estadoSubTarea->setContador($this->getReference('contador1'));
        $estadoSubTarea->setFechaInicio($dateInicio);
        $estadoSubTarea->setFechaFin($dateFin);
        $estadoSubTarea->setHorasTrabajadas(3);
//        $estadoSubTarea->setSubTarea($this->getReference('subtarea'));
        $estadoSubTarea->setTipoEstado($this->getReference('tipoEstado1'));
        $this->addReference('estadoSubTarea', $estadoSubTarea);

        $dateInicio = new \DateTime();
        $dateFin    = new \DateTime();
        $dateInicio->modify('+11 days');
        $dateFin->modify('+1 months');

        $estadoSubTarea2 = new EstadoSubTarea();
        $estadoSubTarea2->setContador($this->getReference('contador2'));
        $estadoSubTarea2->setFechaInicio($dateInicio);
        $estadoSubTarea2->setFechaFin($dateFin);
        $estadoSubTarea2->setHorasTrabajadas(0);
//        $estadoSubTarea->setSubTarea($this->getReference('subtarea'));
        $estadoSubTarea2->setTipoEstado($this->getReference('tipoEstado1'));
        $this->addReference('estadoSubTarea2', $estadoSubTarea2);


        $dateInicio = new \DateTime();
        $dateFin    = new \DateTime();
        $dateInicio->modify('+5 days');
        $dateFin->modify('+5 months');

        $estadoSubTarea3 = new EstadoSubTarea();
        $estadoSubTarea3->setContador($this->getReference('contador1'));
        $estadoSubTarea3->setFechaInicio($dateInicio);
        $estadoSubTarea3->setFechaFin($dateFin);
        $estadoSubTarea3->setHorasTrabajadas(5);
//        $estadoSubTarea->setSubTarea($this->getReference('subtarea'));
        $estadoSubTarea3->setTipoEstado($this->getReference('tipoEstado2'));
        $this->addReference('estadoSubTarea3', $estadoSubTarea3);


        $dateInicio = new \DateTime();
        $dateFin    = new \DateTime();
        $dateInicio->modify('+21 days');
        $dateFin->modify('+10 months');

        $estadoSubTarea4 = new EstadoSubTarea();
        $estadoSubTarea4->setContador($this->getReference('contador2'));
        $estadoSubTarea4->setFechaInicio($dateInicio);
        $estadoSubTarea4->setFechaFin($dateFin);
        $estadoSubTarea4->setHorasTrabajadas(13);
//        $estadoSubTarea->setSubTarea($this->getReference('subtarea'));
        $estadoSubTarea4->setTipoEstado($this->getReference('tipoEstado1'));
        $this->addReference('estadoSubTarea4', $estadoSubTarea4);

        $estadoSubTarea5 = new EstadoSubTarea();
        $estadoSubTarea5->setContador($this->getReference('contador2'));
        $estadoSubTarea5->setFechaInicio($dateInicio);
        $estadoSubTarea5->setFechaFin($dateFin);
        $estadoSubTarea5->setHorasTrabajadas(8);
//        $estadoSubTarea->setSubTarea($this->getReference('subtarea'));
        $estadoSubTarea5->setTipoEstado($this->getReference('tipoEstado1'));
        $this->addReference('estadoSubTarea5', $estadoSubTarea5);

        $estadoSubTarea6 = new EstadoSubTarea();
        $estadoSubTarea6->setContador($this->getReference('contador1'));
        $estadoSubTarea6->setFechaInicio($dateInicio);
        $estadoSubTarea6->setFechaFin($dateFin);
        $estadoSubTarea6->setHorasTrabajadas(9);
//        $estadoSubTarea->setSubTarea($this->getReference('subtarea'));
        $estadoSubTarea6->setTipoEstado($this->getReference('tipoEstado2'));
        $this->addReference('estadoSubTarea6', $estadoSubTarea6);


        $estadoSubTarea7 = new EstadoSubTarea();
        $estadoSubTarea7->setContador($this->getReference('contador2'));
        $estadoSubTarea7->setFechaInicio($dateInicio);
        $estadoSubTarea7->setFechaFin($dateFin);
        $estadoSubTarea7->setHorasTrabajadas(20);
//        $estadoSubTarea->setSubTarea($this->getReference('subtarea'));
        $estadoSubTarea7->setTipoEstado($this->getReference('tipoEstado1'));
        $this->addReference('estadoSubTarea7', $estadoSubTarea7);

        $estadoSubTarea8 = new EstadoSubTarea();
        $estadoSubTarea8->setContador($this->getReference('contador1'));
        $estadoSubTarea8->setFechaInicio($dateInicio);
        $estadoSubTarea8->setFechaFin($dateFin);
        $estadoSubTarea8->setHorasTrabajadas(16);
//        $estadoSubTarea->setSubTarea($this->getReference('subtarea'));
        $estadoSubTarea8->setTipoEstado($this->getReference('tipoEstado1'));
        $this->addReference('estadoSubTarea8', $estadoSubTarea8);


        $manager->persist($estadoSubTarea);
        $manager->persist($estadoSubTarea2);
        $manager->persist($estadoSubTarea3);
        $manager->persist($estadoSubTarea4);
        $manager->persist($estadoSubTarea5);
        $manager->persist($estadoSubTarea6);
        $manager->persist($estadoSubTarea7);
        $manager->persist($estadoSubTarea8);

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
