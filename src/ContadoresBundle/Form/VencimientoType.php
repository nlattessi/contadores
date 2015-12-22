<?php

namespace ContadoresBundle\Form;

use ContadoresBundle\Entity\Esquema;
use ContadoresBundle\Servicios\VencimientoService;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class VencimientoType extends AbstractType
{
    private $vencimientoService;

    public function __construct(VencimientoService $vencimientoService)
    {
        $this->vencimientoService = $vencimientoService;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fecha')
            ->add('colaCuil')
            ->add('tareaMetadata')
            ->add('esquema', 'entity', [
                'class' => 'ContadoresBundle:Esquema',
                'empty_value' => '',
                'choices' => $this->vencimientoService->obtenerEsquemasHabilitados()
            ])
        ;

        $formModifier = function(FormInterface $form, Esquema $esquema = null) {
            $periodos = null === $esquema ? array() : $this->vencimientoService->obtenerPeriodosPorEsquema($esquema);
            //$falsoP =  $this->vencimientoService->obtenerFalsoPeriodo();
            //array_push($periodos, $falsoP);
            $form->add('periodo', 'entity', array(
                'class' => 'ContadoresBundle:Periodo',
                'empty_value' => '',
                'required' => false,
                'choices' =>$periodos
            ));

        };
            $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) use ($formModifier) {
                $data = $event->getData();

                $formModifier($event->getForm(), $data->getEsquema());
            }
        );
        //No invoca esto cuando modifica el dato de esquema!
        $builder->get('esquema')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) use ($formModifier) {
                $esquema = $event->getForm()->getData();
                $formModifier($event->getForm()->getParent(), $esquema);
            }
        );
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ContadoresBundle\Entity\Vencimiento'
        ));
    }

    public function getName()
    {
        return 'contadoresbundle_vencimiento';
    }
}
