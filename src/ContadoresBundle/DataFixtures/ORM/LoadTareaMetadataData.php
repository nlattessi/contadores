<?php

namespace ContadoresBundle\DataFixtures\ORM;

use \Doctrine\Common\DataFixtures\AbstractFixture;
use \Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use \Doctrine\Common\Persistence\ObjectManager;

use ContadoresBundle\Entity\TareaMetadata;

class LoadTareaMetadataData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $tareaMetadata1 = new TareaMetadata();
        $tareaMetadata1->setNombre('Liquidar IVA');
        $tareaMetadata1->setEsperiodica(false);
        $tareaMetadata1->setImpuesto(null);
        $tareaMetadata1->setArea($this->getReference('area1'));
        $this->addReference('tareaMetadata1', $tareaMetadata1);

        $tareaMetadata2 = new TareaMetadata();
        $tareaMetadata2->setNombre('Bienes Personales');
        $tareaMetadata2->setEsperiodica(false);
        $tareaMetadata2->setImpuesto(null);
        $tareaMetadata2->setArea($this->getReference('area1'));
        $this->addReference('tareaMetadata2', $tareaMetadata2);

        $tareaMetadata3 = new TareaMetadata();
        $tareaMetadata3->setNombre('Impuesto a las ganancias');
        $tareaMetadata3->setEsperiodica(false);
        $tareaMetadata3->setImpuesto($this->getReference('impuesto1'));
        $tareaMetadata3->setArea($this->getReference('area1'));
        $this->addReference('tareaMetadata3', $tareaMetadata3);

        $tareaMetadata4 = new TareaMetadata();
        $tareaMetadata4->setNombre('Monotributo');
        $tareaMetadata4->setEsperiodica(false);
        $tareaMetadata4->setImpuesto($this->getReference('impuesto1'));
        $tareaMetadata4->setArea($this->getReference('area1'));
        $this->addReference('tareaMetadata4', $tareaMetadata4);

        $manager->persist($tareaMetadata1);
        $manager->persist($tareaMetadata2);
        $manager->persist($tareaMetadata3);
        $manager->persist($tareaMetadata4);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 9;
    }
}
