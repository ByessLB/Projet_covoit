<?php

namespace App\Form;

use App\Entity\Vehicule;
use App\Entity\Personne;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VehiculeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('marque')
            ->add('modele')
            ->add('nbPlace')
            ->add('validiteAssurance')
            ->add('validiteControleTech')
            ->add(
                'personne',
                EntityType::class,
                [
                    'class'         => Personne::class,
                    'choice_label'  => 'nom',
                    'label'         => 'choisir personne',
                    'multiple'      => false,
                ]
                )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vehicule::class,
        ]);
    }
}
