<?php

namespace ContadoresBundle\Form;

use Lexik\Bundle\FormFilterBundle\Filter\FilterOperands;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormError;

class TareaContadorFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fechaInicio', 'filter_date_range',array(
                'left_date_options'  => array('widget' => 'single_text',),
                'right_date_options' => array('widget' => 'single_text', )))
            ->add('fechaCreacion', 'filter_date_range',array(
                'left_date_options'  => array('widget' => 'single_text',  ),
                'right_date_options' => array('widget' => 'single_text',  )))
            ->add('vencimientoFiscal', 'filter_date_range',array(
                'left_date_options'  => array('widget' => 'single_text', ),
                'right_date_options' => array('widget' => 'single_text',  )))
            ->add('vencimientoInterno', 'filter_date_range',array(
                'left_date_options'  => array('widget' => 'single_text',  ),
                'right_date_options' => array('widget' => 'single_text',  )))
            ->add('nombre', 'filter_text', array('condition_pattern' => FilterOperands::STRING_BOTH,))
           /* ->add('cliente', 'entity',
                array('class' => 'ContadoresBundle\Entity\Cliente',
                    'property' => 'nombre'))*/
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
        return 'contadoresbundle_tareacontadorfiltertype';
    }
}
