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
//INSERT INTO `tarea_metadata` VALUES (1,'Liquidar IVA',FALSE,1,NULL),(2,'Liquidar IVA 2015',FALSE,1,1);
        $tareaMetadata1 = new TareaMetadata();
        $tareaMetadata1->setNombre('Liquidar IVA');
        $tareaMetadata1->setEsperiodica(false);
        $tareaMetadata1->setImpuesto(null);
        $tareaMetadata1->setArea($this->getReference('area1'));
        $this->addReference('tareaMetadata1', $tareaMetadata1);

        $tareaMetadata2 = new TareaMetadata();
        $tareaMetadata2->setNombre('Liquidar IVA 2015');
        $tareaMetadata2->setEsperiodica(false);
        $tareaMetadata2->setImpuesto($this->getReference('impuesto1'));
        $tareaMetadata2->setArea($this->getReference('area1'));
        $this->addReference('tareaMetadata2', $tareaMetadata2);

        $manager->persist($tareaMetadata1);
        $manager->persist($tareaMetadata2);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 5;
    }
}
