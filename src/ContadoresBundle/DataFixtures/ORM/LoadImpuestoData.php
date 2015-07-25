<?php

namespace ContadoresBundle\DataFixtures\ORM;

use \Doctrine\Common\DataFixtures\AbstractFixture;
use \Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use \Doctrine\Common\Persistence\ObjectManager;

use ContadoresBundle\Entity\Impuesto;

class LoadImpuestoData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $impuesto1 = new Impuesto();
        $impuesto1->setNombre('Liquidacion IVA');
        $this->addReference('impuesto1', $impuesto1);

        $impuesto2 = new Impuesto();
        $impuesto2->setNombre('Ingresos Brutos');
        $this->addReference('impuesto2', $impuesto2);

        $manager->persist($impuesto1);
        $manager->persist($impuesto2);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 4;
    }
}
