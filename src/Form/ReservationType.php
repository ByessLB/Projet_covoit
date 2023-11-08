<?php

namespace App\Form;

use App\Entity\Reservation;
use App\Entity\Personne;
use App\Entity\Trajet;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lundi')
            ->add('mardi')
            ->add('mercredi')
            ->add('jeudi')
            ->add('vendredi')
            ->add(
                'personne',
                EntityType::class,
                [
                    'class'         => Personne::class,
                    'choice_label'  => 'pseudo',
                    'label'         => 'Qui est-il ?',
                    'multiple'      => false
                ])
            ->add(
                'trajet',
                EntityType::class,
                [
                    'class'         => Trajet::class,
                    'choice_label'  => 'id',
                    'label'         => 'Selectionner',
                    'multiple'      => false
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
