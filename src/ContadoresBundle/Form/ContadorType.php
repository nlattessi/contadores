<?php

namespace ContadoresBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContadorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('apellido')
            ->add('celular')
            ->add('mail')
            ->add('telefono')
            ->add('usuario')
            ->add('area')
            ->add('esJefe', 'choice', ['choices' => [1 => 'Si', 0 => 'No'], 'label' => '¿Es Jefe de área? '])
            ->add('reset', 'reset', ['label' => 'Limpiar '])
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ContadoresBundle\Entity\Contador'
        ));
    }

    public function getName()
    {
        return 'contadoresbundle_contador';
    }
}
