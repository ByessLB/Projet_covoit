<?php

namespace App\Form;

use App\Entity\Personne;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersonneType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('pseudo')
            ->add('nom')
            ->add('prenom')
            ->add('numAfpa')
            ->add('tel')
            ->add('numRue')
            ->add('rue')
            ->add('codePostal')
            ->add('ville')
            ->add('email')
            ->add('password')
            ->add(
                'debutFormation',
                DateType::class,
                [
                    'widget'    => 'single_text',
                    'format'    => 'yyyy-MM-dd'
                ])
            ->add(
                'finFormation',
                DateType::class,
                [
                    'widget'    => 'single_text',
                    'format'    => 'yyyy-MM-dd'
                ])
            ->add(
                'dateNaissance',
                BirthdayType::class,
                [
                    'placeholder'        => 
                    [
                        'day'   => 'Jour',
                        'month' => 'Mois',
                        'year'  => 'Année',
                    ]
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Personne::class,
        ]);
    }
}
