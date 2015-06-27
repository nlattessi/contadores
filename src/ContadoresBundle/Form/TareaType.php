<?php

namespace ContadoresBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TareaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fechaInicio')
            ->add('fechaFin')
            ->add('vencimientoFiscal')
            ->add('vencimientoInterno')
            ->add('nombre')
            ->add('contador')
            ->add('cliente')
            ->add('estadoActual')
            ->add('tareaMetadata')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ContadoresBundle\Entity\Tarea'
        ));
    }

    public function getName()
    {
        return 'contadoresbundle_tarea';
    }
}
