<?php

namespace App\Form;

use App\Entity\Dircab;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class DircabType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nom')
            ->add('Prenoms')
            ->add('Date_Nomin',DateType::class, [
               
                'widget' => 'single_text',
            ])
            ->add('Arrete_Nomin')
            ->add('Date_Abrog',DateType::class, [
               
                'widget' => 'single_text',
            ])
            ->add('Arrete_Abrog')
            ->add('titre')
            ->add('Phone')
            ->add('observation')
            ->add('depute')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Dircab::class,
        ]);
    }
}
