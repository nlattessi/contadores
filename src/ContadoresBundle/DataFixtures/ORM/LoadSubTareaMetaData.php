<?php

namespace ContadoresBundle\DataFixtures\ORM;

use \Doctrine\Common\DataFixtures\AbstractFixture;
use \Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use \Doctrine\Common\Persistence\ObjectManager;

use ContadoresBundle\Entity\SubTareaMetadata;

class LoadSubTareaMetadataData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $subTareaMetadata1 = new SubTareaMetadata();
        $subTareaMetadata1->setNombre('Recolectar ventas');
        $subTareaMetadata1->setTiempoEstimado(4);
        $subTareaMetadata1->setTareaMetadata($this->getReference('tareaMetadata1'));
        $this->addReference('subTareaMetadata1', $subTareaMetadata1);

        $subTareaMetadata2 = new SubTareaMetadata();
        $subTareaMetadata2->setNombre('Llenar excel Ventas');
        $subTareaMetadata2->setTiempoEstimado(1);
        $subTareaMetadata2->setTareaMetadata($this->getReference('tareaMetadata1'));
        $this->addReference('subTareaMetadata2', $subTareaMetadata2);

        $subTareaMetadata3 = new SubTareaMetadata();
        $subTareaMetadata3->setNombre('Llenar formulario');
        $subTareaMetadata3->setTiempoEstimado(2);
        $subTareaMetadata3->setTareaMetadata($this->getReference('tareaMetadata1'));
        $this->addReference('subTareaMetadata3', $subTareaMetadata3);

        $manager->persist($subTareaMetadata1);
        $manager->persist($subTareaMetadata2);
        $manager->persist($subTareaMetadata3);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 10;
    }
}
