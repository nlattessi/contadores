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
        $contador1->setNombre('Sebastian');
        $contador1->setApellido('Torrico');
        $contador1->setCelular('1133242222');
        $contador1->setMail('torrico@sanlorenzo.com');
        $contador1->setUsuario($this->getReference('userContador'));
        $contador1->setTelefono('01166837452');
        $this->addReference('contador1', $contador1);

        $contador2 = new Contador();
        $contador2->setNombre('Nereo');
        $contador2->setApellido('Champagne');
        $contador2->setCelular('1147564342');
        $contador2->setMail('nereo@homesrl.com');
        $contador2->setUsuario($this->getReference('userContador2'));
        $contador2->setTelefono('41239812');
        $this->addReference('contador2', $contador2);

        $contador3 = new Contador();
        $contador3->setNombre('Pablo');
        $contador3->setApellido('Migliore');
        $contador3->setCelular('1144563335');
        $contador3->setMail('migliore@soloyo.com');
        $contador3->setUsuario($this->getReference('userContador3'));
        $contador3->setTelefono('49854772');
        $this->addReference('contador3', $contador3);


        $manager->persist($contador1);
        $manager->persist($contador2);
        $manager->persist($contador3);

        $manager->flush();

        $this->getReference('userContador')->setEntidadId($this->getReference('userContador')->getId());
        $this->getReference('userContador2')->setEntidadId($this->getReference('userContador2')->getId());
        $this->getReference('userContador3')->setEntidadId($this->getReference('userContador3')->getId());

        $manager->persist($this->getReference('userContador'));
        $manager->persist($this->getReference('userContador2'));
        $manager->persist($this->getReference('userContador3'));

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
