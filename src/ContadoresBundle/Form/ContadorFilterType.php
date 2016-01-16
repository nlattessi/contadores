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

class ContadorFilterType extends AbstractType
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
            ->add('nombre', 'filter_text', array('condition_pattern' => FilterOperands::STRING_BOTH,))
            ->add('apellido', 'filter_text', array('condition_pattern' => FilterOperands::STRING_BOTH,))
            ->add('celular', 'filter_text')
            ->add('mail', 'filter_text', array('condition_pattern' => FilterOperands::STRING_BOTH,))
            ->add('telefono', 'filter_text')
            ->add('area', 'filter_entity', [
                'class' => 'ContadoresBundle:Area',
                'choices' => $this->filtroService->obtenerAreasActivas()
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
        return 'contadoresbundle_contadorfiltertype';
    }
}
