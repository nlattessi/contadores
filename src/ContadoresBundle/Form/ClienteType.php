<?php

namespace ContadoresBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ClienteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('direccion')
            ->add('telefono')
            ->add('mail')
            ->add('cuit')
            ->add('usuario')
            ->add('reset', 'reset', ['label' => 'Limpiar '])

            ->add('attachment', 'file', [
                'label' => 'Cargar Archivos',
                'required' => false,
                'mapped' => false,
                'multiple' => true
            ])
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ContadoresBundle\Entity\Cliente'
        ));
    }

    public function getName()
    {
        return 'contadoresbundle_cliente';
    }
}
