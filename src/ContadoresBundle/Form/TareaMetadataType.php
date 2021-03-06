<?php

namespace ContadoresBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TareaMetadataType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('rubro')
            ->add('esPeriodica', 'choice', ['choices' => [1 => 'Si', 0 => 'No'], 'label' => '¿Es Periódica? '])
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
            'data_class' => 'ContadoresBundle\Entity\TareaMetadata'
        ));
    }

    public function getName()
    {
        return 'contadoresbundle_tareametadata';
    }
}
