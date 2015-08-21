<?php

namespace ContadoresBundle\DataFixtures\ORM;

use \Doctrine\Common\DataFixtures\AbstractFixture;
use \Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use \Doctrine\Common\Persistence\ObjectManager;

use ContadoresBundle\Entity\Cliente;

class LoadClienteData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $cliente1 = new Cliente();
        $cliente1->setNombre('Algo S.A.');
        $cliente1->setDireccion('rivadavia 4118');
        $cliente1->setTelefono('156654342');
        $cliente1->setMail('este es el mail');
        $cliente1->setCuit('30-12345345-7');
        $cliente1->setUsuario($this->getReference('userCliente'))
        $this->addReference('cliente1', $cliente1);

        $manager->persist($cliente1);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 4;
    }
}
