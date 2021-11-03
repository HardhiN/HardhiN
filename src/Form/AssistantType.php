<?php

namespace App\Form;

use App\Entity\Assistant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class AssistantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('AssNom')
            ->add('AssPrenom')
            ->add('DateNomination',DateType::class, [
                'widget' => 'single_text',
                
            ])
            ->add('ArreteNomination')
            ->add('DateAbrogation',DateType::class, [
               
                'widget' => 'single_text',
            ])
            ->add('ArreteAbrog')
            ->add('Titre',ChoiceType::class, [
                'choices' => [
                    'Assistant Parlementaire Non Permanent (APNP)' => 'APNP',
                    'Assistant Parlementaire Permanent (APP)' => 'APP',
                    'Assistant Technique Non Permanent (ATNP)' => 'ATNP',
                    'Assistant Technique Permanent (ATP)'=>'ATP',
                ],
            ])
            ->add('Observation')
            ->add('depute')
            ->add('Telephone')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Assistant::class,
        ]);
    }
}
