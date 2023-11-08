<?php

namespace App\Form;

use App\Entity\Trajet;
use App\Entity\Personne;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TrajetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('numRueDepart')
            ->add('rueDepart')
            ->add('CPDepart')
            ->add('villeDepart')
            ->add('numRueArrivee')
            ->add('rueArrivee')
            ->add('CPArrivee')
            ->add('villeArrivee')
            ->add('heureAller')
            ->add('heureRetour')
            ->add(
                'personne',
                EntityType::class,
                [
                    'class'         => Personne::class,
                    'choice_label'  => 'pseudo',
                    'label'         => 'Qui est-il ?',
                    'multiple'      => false
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Trajet::class,
        ]);
    }
}
