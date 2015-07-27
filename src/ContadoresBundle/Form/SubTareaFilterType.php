<?php

namespace ContadoresBundle\Form;

use Lexik\Bundle\FormFilterBundle\Filter\FilterOperands;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormError;

class SubTareaFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id', 'filter_number_range')
            ->add('fechaInicio', 'filter_date_range',array(
                'left_date_options'  => array('widget' => 'single_text',  ),
                'right_date_options' => array('widget' => 'single_text',  )))
            ->add('fechaFin', 'filter_date_range',array(
                'left_date_options'  => array('widget' => 'single_text',  ),
                'right_date_options' => array('widget' => 'single_text',  )))
            ->add('fechaCreacion', 'filter_date_range',array(
                'left_date_options'  => array('widget' => 'single_text',  ),
                'right_date_options' => array('widget' => 'single_text',  )))
            ->add('tiempoEmpleado', 'filter_number_range')
            ->add('nombre', 'filter_text', array('condition_pattern' => FilterOperands::STRING_BOTH,))
        ;

        $listener = function(FormEvent $event)
        {
            // Is data empty?
            foreach ($event->getData() as $data) {
                if(is_array($data)) {
                    foreach ($data as $subData) {
                        if(!empty($subData)) return;
                    }
                }
                else {
                    if(!empty($data)) return;
                }
            }

            $event->getForm()->addError(new FormError('Filter empty'));
        };
        $builder->addEventListener(FormEvents::POST_BIND, $listener);
    }

    public function getName()
    {
        return 'contadoresbundle_subtareafiltertype';
    }
}
