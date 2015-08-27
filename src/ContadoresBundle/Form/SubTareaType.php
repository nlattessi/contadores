<?php

namespace ContadoresBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SubTareaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fechaInicio', 'date', array('label' => 'Fecha inicio', 'widget' => 'single_text'))
            ->add('fechaFin', 'date', array('label' => 'Fecha fin', 'widget' => 'single_text'))
            ->add('nombre')
            ->add('subTareaMetadata')
            ->add('tarea')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ContadoresBundle\Entity\SubTarea'
        ));
    }

    public function getName()
    {
        return 'contadoresbundle_subtarea';
    }
}
