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
        $subTareaMetadata1->setNombre('Recopilar ventas');
        $subTareaMetadata1->setTiempoEstimado(4);
        $subTareaMetadata1->setTareaMetadata($this->getReference('tareaMetadata1'));
        $this->addReference('subTareaMetadata1', $subTareaMetadata1);

        $subTareaMetadata2 = new SubTareaMetadata();
        $subTareaMetadata2->setNombre('Recopilar compras');
        $subTareaMetadata2->setTiempoEstimado(1);
        $subTareaMetadata2->setTareaMetadata($this->getReference('tareaMetadata1'));
        $this->addReference('subTareaMetadata2', $subTareaMetadata2);

        $subTareaMetadata3 = new SubTareaMetadata();
        $subTareaMetadata3->setNombre('Realizar Informe liquidación');
        $subTareaMetadata3->setTiempoEstimado(2);
        $subTareaMetadata3->setTareaMetadata($this->getReference('tareaMetadata1'));
        $this->addReference('subTareaMetadata3', $subTareaMetadata3);

        //--------------------------

        $subTareaMetadata4 = new SubTareaMetadata();
        $subTareaMetadata4->setNombre('Recopilar bienes');
        $subTareaMetadata4->setTiempoEstimado(2);
        $subTareaMetadata4->setTareaMetadata($this->getReference('tareaMetadata2'));
        $this->addReference('subTareaMetadata4', $subTareaMetadata4);

        $subTareaMetadata5 = new SubTareaMetadata();
        $subTareaMetadata5->setNombre('Actualizar valores');
        $subTareaMetadata5->setTiempoEstimado(5);
        $subTareaMetadata5->setTareaMetadata($this->getReference('tareaMetadata2'));
        $this->addReference('subTareaMetadata5', $subTareaMetadata5);

        $subTareaMetadata6 = new SubTareaMetadata();
        $subTareaMetadata6->setNombre('Presentar en AFIP');
        $subTareaMetadata6->setTiempoEstimado(6);
        $subTareaMetadata6->setTareaMetadata($this->getReference('tareaMetadata2'));
        $this->addReference('subTareaMetadata6', $subTareaMetadata6);

        //--------------------------

        $subTareaMetadata7 = new SubTareaMetadata();
        $subTareaMetadata7->setNombre('Recopilar ventas');
        $subTareaMetadata7->setTiempoEstimado(3);
        $subTareaMetadata7->setTareaMetadata($this->getReference('tareaMetadata3'));
        $this->addReference('subTareaMetadata7', $subTareaMetadata7);

        $subTareaMetadata8 = new SubTareaMetadata();
        $subTareaMetadata8->setNombre('Calcular gastos');
        $subTareaMetadata8->setTiempoEstimado(4);
        $subTareaMetadata8->setTareaMetadata($this->getReference('tareaMetadata3'));
        $this->addReference('subTareaMetadata8', $subTareaMetadata8);

        //--------------------------

        $subTareaMetadata9 = new SubTareaMetadata();
        $subTareaMetadata9->setNombre('Presentar en SIRADIG');
        $subTareaMetadata9->setTiempoEstimado(2);
        $subTareaMetadata9->setTareaMetadata($this->getReference('tareaMetadata4'));
        $this->addReference('subTareaMetadata9', $subTareaMetadata9);


        $manager->persist($subTareaMetadata1);
        $manager->persist($subTareaMetadata2);
        $manager->persist($subTareaMetadata3);
        $manager->persist($subTareaMetadata4);
        $manager->persist($subTareaMetadata5);
        $manager->persist($subTareaMetadata6);
        $manager->persist($subTareaMetadata7);
        $manager->persist($subTareaMetadata8);
        $manager->persist($subTareaMetadata9);

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
