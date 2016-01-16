<?php

namespace ContadoresBundle\Form;

use ContadoresBundle\Servicios\FiltroService;
use Lexik\Bundle\FormFilterBundle\Filter\FilterOperands;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormError;

class TareaFilterType extends AbstractType
{
    private $filtroService;

    function __construct(FiltroService $fs)
    {
        $this->filtroService = $fs;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id', 'filter_number_range')
            ->add('fechaInicio', 'filter_date_range',array(
        'left_date_options'  => array('widget' => 'single_text',),
        'right_date_options' => array('widget' => 'single_text', )))
            ->add('fechaFin', 'filter_date_range',array(
                'left_date_options'  => array('widget' => 'single_text',),
                'right_date_options' => array('widget' => 'single_text', )))
            ->add('fechaCreacion', 'filter_date_range',array(
                'left_date_options'  => array('widget' => 'single_text',  ),
                'right_date_options' => array('widget' => 'single_text',  )))
            ->add('vencimientoInterno', 'filter_date_range', array(
                'left_date_options' => array(
                    'widget' => 'single_text',
                    'format' => 'dd/M/yyyy'
                ),
                'right_date_options' => array(
                    'widget' => 'single_text',
                    'format' => 'dd/M/yyyy'
                ),
                'label' => 'Fecha inicio',
            ))
            ->add('vencimientoFiscal', 'filter_date_range', array(
                'left_date_options' => array(
                    'widget' => 'single_text',
                    'format' => 'dd/M/yyyy'
                ),
                'right_date_options' => array(
                    'widget' => 'single_text',
                    'format' => 'dd/M/yyyy'
                ),
                'label' => 'Fecha inicio',
            ))
            ->add('tareaMetadata', 'filter_entity', [
                'class' => 'ContadoresBundle:TareaMetadata',
                'choices' => $this->filtroService->obtenerTareaMetadataActivas()
            ])
            ->add('nombre', 'filter_text', array('condition_pattern' => FilterOperands::STRING_BOTH,))
            ->add('contador', 'filter_entity', [
                'class' => 'ContadoresBundle:Contador',
                'choices' => $this->filtroService->obtenerContadoresActivos()
            ])
            ->add('cliente', 'filter_entity', [
                'class' => 'ContadoresBundle:Cliente',
                'choices' => $this->filtroService->obtenerClientesActivos()
            ])
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

            $event->getForm()->addError(new FormError('Este filtro no devuelve resultados'));
        };
        $builder->addEventListener(FormEvents::POST_BIND, $listener);
    }

    public function getName()
    {
        return 'contadoresbundle_tareafiltertype';
    }
}
