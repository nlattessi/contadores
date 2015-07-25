<?php

namespace ContadoresBundle\DataFixtures\ORM;

use \Doctrine\Common\DataFixtures\AbstractFixture;
use \Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use \Doctrine\Common\Persistence\ObjectManager;

use ContadoresBundle\Entity\Usuario;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $userSuperAdmin = new Usuario();
        $userSuperAdmin->setMail('superadmin@superadmin.com');
        $userSuperAdmin->setPassword('superadmin');
        $userSuperAdmin->setEntidadId(1);
        $userSuperAdmin->setActivo(true);
        $userSuperAdmin->setRol($this->getReference('rolSuperAdmin'));
        $this->addReference('userSuperAdmin', $userSuperAdmin);

        $userContador = new Usuario();
        $userContador->setMail('contador@contador.com');
        $userContador->setPassword('contador');
        $userContador->setEntidadId(1);
        $userContador->setActivo(true);
        $userContador->setRol($this->getReference('rolContador'));
        $this->addReference('userContador', $userContador);

        $userCliente = new Usuario();
        $userCliente->setMail('cliente@cliente.com');
        $userCliente->setPassword('cliente');
        $userCliente->setEntidadId(1);
        $userCliente->setActivo(true);
        $userCliente->setRol($this->getReference('rolCliente'));
        $this->addReference('userCliente', $userCliente);

        $manager->persist($userSuperAdmin);
        $manager->persist($userContador);
        $manager->persist($userCliente);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2;
    }
}
