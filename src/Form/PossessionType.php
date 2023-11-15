<?php

namespace App\Form;

use App\Entity\Personne;
use App\Entity\Possession;
use App\Entity\Vehicule;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PossessionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'personne',
                EntityType::class,
                [
                    'class'         => Personne::class,
                    'choice_label'  => 'nom',
                    'label'         => 'Choisir',
                    'multiple'      => false
                ])
            ->add(
                'vehicule',
                EntityType::class,
                [
                    'class'         => Vehicule::class,
                    'choice_label'  => 'marque',
                    'label'         => 'Choisir',
                    'multiple'      => true
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Possession::class,
        ]);
    }
}
