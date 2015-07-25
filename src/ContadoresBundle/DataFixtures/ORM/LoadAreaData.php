<?php

namespace ContadoresBundle\DataFixtures\ORM;

use \Doctrine\Common\DataFixtures\AbstractFixture;
use \Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use \Doctrine\Common\Persistence\ObjectManager;

use ContadoresBundle\Entity\Area;

class LoadAreaData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $area1 = new Area();
        $area1->setNombre('Impuestos Empresas');
        $this->addReference('area1', $area1);

        $area2 = new Area();
        $area2->setNombre('Impuestos personales');
        $this->addReference('area2', $area2);

        $area3 = new Area();
        $area3->setNombre('Monotributo');
        $this->addReference('area3', $area3);

        $manager->persist($area1);
        $manager->persist($area2);
        $manager->persist($area3);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 3;
    }
}
