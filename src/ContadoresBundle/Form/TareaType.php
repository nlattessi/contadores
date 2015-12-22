<?php

namespace ContadoresBundle\Form;

use ContadoresBundle\Entity\Usuario;
use ContadoresBundle\Servicios\TareasService;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TareaType extends AbstractType
{
    protected $usuario;
    protected $tareaService;


    public function __construct( TareasService $ts)
    {
        $this->tareaService = $ts;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $usuario = $options['user'];
        $periodica = $options['periodica'];

        $builder
            ->add('fechaInicio', 'date', array('label' => 'Fecha inicio', 'widget' => 'single_text'))
            ->add('fechaFin',  'text', array('mapped' => false))
            ->add('vencimientoFiscal', 'date', array('label' => 'Vencimiento Fiscal', 'widget' => 'single_text'))
            ->add('vencimientoInterno', 'text', array('mapped' => false))
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
            ->add('reset', 'reset', ['label' => 'Limpiar '])
        ;
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
