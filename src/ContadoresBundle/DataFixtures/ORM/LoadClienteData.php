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
        $cliente1->setNombre('America S.A.');
        $cliente1->setDireccion('rivadavia 4118');
        $cliente1->setTelefono('156654342');
        $cliente1->setMail('welcome@america.com.ar');
        $cliente1->setCuit('30-12345345-7');
        $cliente1->setUsuario($this->getReference('userCliente'));
        $this->addReference('cliente1', $cliente1);

        $cliente2 = new Cliente();
        $cliente2->setNombre('Limousin S.R.L');
        $cliente2->setDireccion('Jujuy 118');
        $cliente2->setTelefono('49837126');
        $cliente2->setMail('hola@limusin.com');
        $cliente2->setCuit('31-123292-9');
        $cliente2->setUsuario($this->getReference('userCliente'));
        $this->addReference('cliente2', $cliente2);

        $cliente3 = new Cliente();
        $cliente3->setNombre('Gomez & Gomez');
        $cliente3->setDireccion('Acoyte 346');
        $cliente3->setTelefono('113698547');
        $cliente3->setMail('consultas@gomezandgomez.com');
        $cliente3->setCuit('20-879625-2');
        $cliente3->setUsuario($this->getReference('userCliente'));
        $this->addReference('cliente3', $cliente3);

        $manager->persist($cliente1);
        $manager->persist($cliente2);
        $manager->persist($cliente3);

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
