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
        $userAdmin = new Usuario();
        $userAdmin->setMail('admin@admin.com');
        $encoder = $this->container
           ->get('security.encoder_factory')
           ->getEncoder($userAdmin)
        ;
        $userAdmin->setPassword($encoder->encodePassword('admin', $userAdmin->getSalt()));
        $userAdmin->setEntidadId(1);
        $userAdmin->setActivo(true);
        $userAdmin->setRol($this->getReference('rolAdmin'));
        $this->addReference('userAdmin', $userAdmin);

        $userJefe = new Usuario();
        $userJefe->setMail('jefe@jefe.com');
        $encoder = $this->container
           ->get('security.encoder_factory')
           ->getEncoder($userJefe)
        ;
        $userJefe->setPassword($encoder->encodePassword('jefe', $userJefe->getSalt()));
        $userJefe->setEntidadId(1);
        $userJefe->setActivo(true);
        $userJefe->setRol($this->getReference('rolJefe'));
        $this->addReference('userJefe', $userJefe);

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

        $manager->persist($userAdmin);
        $manager->persist($userJefe);
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
