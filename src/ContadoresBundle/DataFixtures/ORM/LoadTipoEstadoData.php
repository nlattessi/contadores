<?php

namespace ContadoresBundle\DataFixtures\ORM;

use \Doctrine\Common\DataFixtures\AbstractFixture;
use \Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use \Doctrine\Common\Persistence\ObjectManager;

use ContadoresBundle\Entity\TipoEstado;

class LoadTipoEstadoData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $tipoEstado1 = new TipoEstado();
        $tipoEstado1->setNombre('Nueva');
        $this->addReference('tipoEstado1', $tipoEstado1);

        $tipoEstado2 = new TipoEstado();
        $tipoEstado2->setNombre('En curso');
        $this->addReference('tipoEstado2', $tipoEstado2);

        $tipoEstado3 = new TipoEstado();
        $tipoEstado3->setNombre('Terminada');
        $this->addReference('tipoEstado3', $tipoEstado3);

        $manager->persist($tipoEstado1);
        $manager->persist($tipoEstado2);
        $manager->persist($tipoEstado3);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 8;
    }
}