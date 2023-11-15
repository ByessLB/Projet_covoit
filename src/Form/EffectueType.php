<?php

namespace App\Form;

use App\Entity\Effectue;
use App\Entity\Trajet;
use App\Entity\Vehicule;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EffectueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'vehicule',
                EntityType::class,
                [
                    'class'         => Vehicule::class,
                    'choice_label'  => 'marque',
                    'label'         => 'choisir',
                    'multiple'      => false
                ])
            ->add(
                'trajet',
                EntityType::class,
                [
                    'class'         => Trajet::class,
                    'choice_label'  => 'ville',
                    'label'         => 'choisir',
                    'multiple'      => false
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Effectue::class,
        ]);
    }
}
