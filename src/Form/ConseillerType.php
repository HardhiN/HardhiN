<?php

namespace App\Form;

use App\Entity\Conseiller;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ConseillerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nom')
            ->add('Prenoms')
            ->add('DateNomination',DateType::class, [
               
                'widget' => 'single_text',
            ])
            ->add('ArreteNomin')
            ->add('DateAbrog',DateType::class, [
               
                'widget' => 'single_text',
            ])
            ->add('ArreteAbrog')
            ->add('titre',ChoiceType::class, [
                'choices' => [
                    'Conseiller Technique Permanent (CTP)' => 'CTP',
                    'Conseiller Technique Non Permanent (CTNP)' => 'CTNP',
                   
                ],
            ])
            ->add('Telephone')
            ->add('Observation')
            ->add('Deputes')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Conseiller::class,
        ]);
    }
}
