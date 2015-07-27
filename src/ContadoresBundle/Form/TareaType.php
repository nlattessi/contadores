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
            ->add('fechaInicio', 'date', array('label' => 'Fecha inicio', 'widget' => 'single_text'))
            ->add('fechaFin', 'date', array('label' => 'Fecha fin', 'widget' => 'single_text'))
            ->add('vencimientoFiscal', 'date', array('label' => 'Vencimiento Fiscal', 'widget' => 'single_text'))
            ->add('vencimientoInterno', 'date', array('label' => 'Vencimiento Interno', 'widget' => 'single_text'))
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
