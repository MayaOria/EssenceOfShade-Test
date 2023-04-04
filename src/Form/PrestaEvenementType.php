<?php

namespace App\Form;

use App\Entity\Prestataire;
use App\Entity\PrestaEvenement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PrestaEvenementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prestataire', EntityType::class, [
                'class' => Prestataire::class,
                'choice_label' => 'nomContact'
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PrestaEvenement::class,
        ]);
    }
}
