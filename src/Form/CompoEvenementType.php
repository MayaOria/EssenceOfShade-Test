<?php

namespace App\Form;

use App\Entity\Composition;
use App\Entity\CompoEvenement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class CompoEvenementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('composition', EntityType::class, [
            'class' => Composition::class,
            'choice_label' => 'nom'
        ])
            ->add('quantite', NumberType::class)
            ;
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CompoEvenement::class,
        ]);
    }
}
