<?php

namespace ContadoresBundle\Form;

use ContadoresBundle\Entity\Esquema;
use ContadoresBundle\Servicios\TareasService;
use ContadoresBundle\Servicios\VencimientoService;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;

class TareaType extends AbstractType
{
    protected $tareaService;
    protected $vencimientoService;


    public function __construct( TareasService $ts, VencimientoService $vencimientoService)
    {
        $this->tareaService = $ts;
        $this->vencimientoService = $vencimientoService;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $usuario = $options['user'];
        $periodica = $options['periodica'];

        $builder
            ->add('fechaInicio', 'date', array('label' => 'Fecha inicio', 'widget' => 'single_text'))
            ->add('fechaFin',  'text', array('mapped' => false))
            ->add('vencimientoInterno',  'text', array('mapped' => false, 'required' => false))
            ->add('nombre')
            ->add('contador', 'entity', [
                'class' => 'ContadoresBundle:Contador',
                'empty_value' => '',
                'choices' => $this->tareaService->obtenerContadoresHabilitados($usuario)
            ])
            ->add('cliente')
            ->add('tareaMetadata', 'entity', [
                'class' => 'ContadoresBundle:TareaMetadata',
                'empty_value' => '',
                'choices' => $this->tareaService->obtenerTareaMetadataHabilitada($usuario, $periodica)
            ])
            ->add('tiempoEstimado')

            ->add('attachment', 'file', [
                'label' => 'Cargar Archivos',
                'required' => false,
                'mapped' => false,
                'multiple' => true
            ])

            ->add('reset', 'reset', ['label' => 'Limpiar '])
        ;
        if($periodica){
            $builder
                ->add('esquema', 'entity', [
                    'class' => 'ContadoresBundle:Esquema',
                    'empty_value' => '',
                    'choices' => $this->vencimientoService->obtenerEsquemasHabilitados()
                ]);
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
            $builder->get('esquema')->addEventListener(
                FormEvents::POST_SUBMIT,
                function (FormEvent $event) use ($formModifier) {
                    $esquema = $event->getForm()->getData();
                    $formModifier($event->getForm()->getParent(), $esquema);
                }
            );
        }
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ContadoresBundle\Entity\Tarea',
            'user' => null,
            'periodica' => true
        ));
    }

    public function getName()
    {
        return 'contadoresbundle_tarea';
    }
}
