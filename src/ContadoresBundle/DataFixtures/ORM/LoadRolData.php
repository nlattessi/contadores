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
        $rolAdmin->setId(1);
        $rolAdmin->setNombre('ROLE_ADMIN');
        $this->addReference('rolAdmin', $rolAdmin);

        $rolJefe = new Rol();
        $rolJefe->setId(2);
        $rolJefe->setNombre('ROLE_JEFE');
        $this->addReference('rolJefe', $rolJefe);

        $rolContador = new Rol();
        $rolContador->setId(3);
        $rolContador->setNombre('ROLE_CONTADOR');
        $this->addReference('rolContador', $rolContador);

        $rolCliente = new Rol();
        $rolCliente->setId(4);
        $rolCliente->setNombre('ROLE_CLIENTE');
        $this->addReference('rolCliente', $rolCliente);

        $metadata = $manager->getClassMetaData(get_class($rolAdmin));
        $metadata->setIdGeneratorType(\Doctrine\ORM\Mapping\ClassMetadata::GENERATOR_TYPE_NONE);
        $metadata->setIdGenerator(new \Doctrine\ORM\Id\AssignedGenerator());
        $manager->persist($rolAdmin);

        $metadata = $manager->getClassMetaData(get_class($rolJefe));
        $metadata->setIdGeneratorType(\Doctrine\ORM\Mapping\ClassMetadata::GENERATOR_TYPE_NONE);
        $metadata->setIdGenerator(new \Doctrine\ORM\Id\AssignedGenerator());
        $manager->persist($rolJefe);

        $metadata = $manager->getClassMetaData(get_class($rolContador));
        $metadata->setIdGeneratorType(\Doctrine\ORM\Mapping\ClassMetadata::GENERATOR_TYPE_NONE);
        $metadata->setIdGenerator(new \Doctrine\ORM\Id\AssignedGenerator());
        $manager->persist($rolContador);

        $metadata = $manager->getClassMetaData(get_class($rolCliente));
        $metadata->setIdGeneratorType(\Doctrine\ORM\Mapping\ClassMetadata::GENERATOR_TYPE_NONE);
        $metadata->setIdGenerator(new \Doctrine\ORM\Id\AssignedGenerator());
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
