<?php

namespace App\Form;

use App\Entity\Depute;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DeputeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Num')
            ->add('DepNom')
            ->add('DepPrenom')
            ->add('DepCirco')
            ->add('DepDecision')
            ->add('DepEntite')
            ->add('DepNumArrete')
            ->add('DepPhoto')
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Depute::class,
        ]);
    }
}
