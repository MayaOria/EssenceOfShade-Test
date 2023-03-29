<?php

namespace App\Form;

use App\Entity\Fleur;
use App\Entity\FleurCompo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class FleurCompoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('fleur', EntityType::class, [
            'class' => Fleur::class,
            // 'choice_label' => 'nom'
        ])
            ->add('quantite', NumberType::class)
            ;
           
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FleurCompo::class,
        ]);
    }
}
