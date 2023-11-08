<?php

namespace App\Form;

use App\Entity\Messagerie;
use App\Entity\Personne;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MessagerieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('sujet')
            ->add('message')
            ->add('dateHeure')
            ->add('statut')
            ->add(
                'conducteur',
                EntityType::class,
                [
                    'class'         => Personne::class,
                    'choice_label'  => 'nom',
                    'label'         => 'choisir personne',
                    'multiple'      => false,
                ]
                )
            ->add(
                'passager',
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
            'data_class' => Messagerie::class,
        ]);
    }
}
