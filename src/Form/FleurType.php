<?php

namespace App\Form;

use App\Entity\Fleur;
use App\Entity\Saison;
use App\Entity\ModeVente;
use App\Entity\CouleurFleur;
use App\Entity\Conditionnement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class FleurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prix')
            ->add('image')
            ->add('remarques')
            ->add('couleurFleur', EntityType::class, ['class' => CouleurFleur::class, 'choice_label' => 'nom'])
            ->add('modeVente', EntityType::class, ['class' => ModeVente::class, 'choice_label' => 'nom'])
            ->add('conditionnement', EntityType::class, ['class' => Conditionnement::class, 'choice_label' => 'nombre'])
            
            ->add('saisons', EntityType::class, [
                'class' => Saison::class,
                'choice_label' => 'mois',
                // les combinaisons de ces paramètres détermineront le type de
                // liste de choix : liste, liste déroulante, checkbox ou
                // radiobuttons
                'multiple' => true,
                'expanded' => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Fleur::class,
        ]);
    }
}
