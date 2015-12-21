<?php

namespace Hera\ContadoresBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class VencimientoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fecha')
            ->add('colaCuil')
            ->add('periodo')
            ->add('tareaMetadata')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Hera\ContadoresBundle\Entity\Vencimiento'
        ));
    }

    public function getName()
    {
        return 'hera_contadoresbundle_vencimiento';
    }
}
