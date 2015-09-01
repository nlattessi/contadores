<?php

namespace ContadoresBundle\DataFixtures\ORM;

use \Doctrine\Common\DataFixtures\AbstractFixture;
use \Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use \Doctrine\Common\Persistence\ObjectManager;

use ContadoresBundle\Entity\EstadoTarea;

class LoadEstadoTareaData extends AbstractFixture implements OrderedFixtureInterface
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

        $estadoTarea1 = new EstadoTarea();
        $estadoTarea1->setContador($this->getReference('contador1'));
        $estadoTarea1->setFechaInicio($dateInicio);
        $estadoTarea1->setFechaFin($dateFin);
        $estadoTarea1->setTipoEstado($this->getReference('tipoEstado1'));
        $this->addReference('estadoTarea1', $estadoTarea1);

        $dateInicio = new \DateTime();
        $dateFin    = new \DateTime();
        $dateInicio->modify('+11 days');
        $dateFin->modify('+1 months');

        $estadoTarea2 = new EstadoTarea();
        $estadoTarea2->setContador($this->getReference('contador2'));
        $estadoTarea2->setFechaInicio($dateInicio);
        $estadoTarea2->setFechaFin($dateFin);
        $estadoTarea2->setTipoEstado($this->getReference('tipoEstado1'));
        $this->addReference('estadoTarea2', $estadoTarea2);


        $dateInicio = new \DateTime();
        $dateFin    = new \DateTime();
        $dateInicio->modify('+5 days');
        $dateFin->modify('+5 months');

        $estadoTarea3 = new EstadoTarea();
        $estadoTarea3->setContador($this->getReference('contador1'));
        $estadoTarea3->setFechaInicio($dateInicio);
        $estadoTarea3->setFechaFin($dateFin);
        $estadoTarea3->setTipoEstado($this->getReference('tipoEstado2'));
        $this->addReference('estadoTarea3', $estadoTarea3);


        $dateInicio = new \DateTime();
        $dateFin    = new \DateTime();
        $dateInicio->modify('+21 days');
        $dateFin->modify('+10 months');

        $estadoTarea4 = new EstadoTarea();
        $estadoTarea4->setContador($this->getReference('contador2'));
        $estadoTarea4->setFechaInicio($dateInicio);
        $estadoTarea4->setFechaFin($dateFin);
        $estadoTarea4->setTipoEstado($this->getReference('tipoEstado1'));
        $this->addReference('estadoTarea4', $estadoTarea4);

        $estadoTarea5 = new EstadoTarea();
        $estadoTarea5->setContador($this->getReference('contador2'));
        $estadoTarea5->setFechaInicio($dateInicio);
        $estadoTarea5->setFechaFin($dateFin);
        $estadoTarea5->setTipoEstado($this->getReference('tipoEstado1'));
        $this->addReference('estadoTarea5', $estadoTarea5);

        $estadoTarea6 = new EstadoTarea();
        $estadoTarea6->setContador($this->getReference('contador1'));
        $estadoTarea6->setFechaInicio($dateInicio);
        $estadoTarea6->setFechaFin($dateFin);
        $estadoTarea6->setTipoEstado($this->getReference('tipoEstado2'));
        $this->addReference('estadoTarea6', $estadoTarea6);


        $estadoTarea7 = new EstadoTarea();
        $estadoTarea7->setContador($this->getReference('contador2'));
        $estadoTarea7->setFechaInicio($dateInicio);
        $estadoTarea7->setFechaFin($dateFin);
        $estadoTarea7->setTipoEstado($this->getReference('tipoEstado1'));
        $this->addReference('estadoTarea7', $estadoTarea7);

        $estadoTarea8 = new EstadoTarea();
        $estadoTarea8->setContador($this->getReference('contador1'));
        $estadoTarea8->setFechaInicio($dateInicio);
        $estadoTarea8->setFechaFin($dateFin);
        $estadoTarea8->setTipoEstado($this->getReference('tipoEstado1'));
        $this->addReference('estadoTarea8', $estadoTarea8);

        $estadoTarea9 = new EstadoTarea();
        $estadoTarea9->setContador($this->getReference('contador1'));
        $estadoTarea9->setFechaInicio($dateInicio);
        $estadoTarea9->setFechaFin($dateFin);
        $estadoTarea9->setTipoEstado($this->getReference('tipoEstado1'));
        $this->addReference('estadoTarea9', $estadoTarea9);


        $manager->persist($estadoTarea1);
        $manager->persist($estadoTarea2);
        $manager->persist($estadoTarea3);
        $manager->persist($estadoTarea4);
        $manager->persist($estadoTarea5);
        $manager->persist($estadoTarea6);
        $manager->persist($estadoTarea7);
        $manager->persist($estadoTarea8);
        $manager->persist($estadoTarea9);

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
