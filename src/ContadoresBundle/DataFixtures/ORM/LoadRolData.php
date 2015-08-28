<?php

namespace ContadoresBundle\DataFixtures\ORM;

use \Doctrine\Common\DataFixtures\AbstractFixture;
use \Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use \Doctrine\Common\Persistence\ObjectManager;

use ContadoresBundle\Entity\Rol;

class LoadRolData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $rolAdmin = new Rol();
        $rolAdmin->setNombre('ROLE_ADMIN');
        $this->addReference('rolAdmin', $rolAdmin);

        $rolJefe = new Rol();
        $rolJefe->setNombre('ROLE_JEFE');
        $this->addReference('rolJefe', $rolJefe);

        $rolContador = new Rol();
        $rolContador->setNombre('ROLE_CONTADOR');
        $this->addReference('rolContador', $rolContador);

        $rolCliente = new Rol();
        $rolCliente->setNombre('ROLE_CLIENTE');
        $this->addReference('rolCliente', $rolCliente);

        $manager->persist($rolAdmin);
        $manager->persist($rolJefe);
        $manager->persist($rolContador);
        $manager->persist($rolCliente);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1;
    }
}
