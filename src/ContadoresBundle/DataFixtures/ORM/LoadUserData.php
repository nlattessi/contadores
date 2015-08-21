<?php

namespace ContadoresBundle\DataFixtures\ORM;

use \Doctrine\Common\DataFixtures\AbstractFixture;
use \Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use \Doctrine\Common\Persistence\ObjectManager;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;


use ContadoresBundle\Entity\Usuario;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $userSuperAdmin = new Usuario();
        $userSuperAdmin->setMail('superadmin@superadmin.com');

        $encoder = $this->container
           ->get('security.encoder_factory')
           ->getEncoder($userSuperAdmin)
        ;
        $userSuperAdmin->setPassword($encoder->encodePassword('superadmin', $userSuperAdmin->getSalt()));

        $userSuperAdmin->setEntidadId(1);
        $userSuperAdmin->setActivo(true);
        $userSuperAdmin->setRol($this->getReference('rolSuperAdmin'));
        $this->addReference('userSuperAdmin', $userSuperAdmin);

        $userContador = new Usuario();
        $userContador->setMail('contador@contador.com');

        $encoder = $this->container
           ->get('security.encoder_factory')
           ->getEncoder($userContador)
        ;
        $userContador->setPassword($encoder->encodePassword('contador', $userContador->getSalt()));

        $userContador->setEntidadId(1);
        $userContador->setActivo(true);
        $userContador->setRol($this->getReference('rolContador'));
        $this->addReference('userContador', $userContador);

        $userCliente = new Usuario();
        $userCliente->setMail('cliente@cliente.com');

        $encoder = $this->container
           ->get('security.encoder_factory')
           ->getEncoder($userCliente)
        ;
        $userCliente->setPassword($encoder->encodePassword('cliente', $userCliente->getSalt()));

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
