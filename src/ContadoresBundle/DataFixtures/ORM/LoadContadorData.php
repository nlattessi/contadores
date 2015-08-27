<?php

namespace ContadoresBundle\DataFixtures\ORM;

use \Doctrine\Common\DataFixtures\AbstractFixture;
use \Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use \Doctrine\Common\Persistence\ObjectManager;

use ContadoresBundle\Entity\Contador;

class LoadContadorData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $contador1 = new Contador();
        $contador1->setNombre('Federico');
        $contador1->setApellido('Gonzalez Castanon');
        $contador1->setCelular(null);
        $contador1->setMail(null);
        $contador1->setUsuario($this->getReference('userContador'));
        $contador1->setTelefono('01166837452');
        $this->addReference('contador1', $contador1);

        $manager->persist($contador1);

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
