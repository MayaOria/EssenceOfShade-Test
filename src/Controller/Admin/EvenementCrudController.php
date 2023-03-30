<?php

namespace App\Controller\Admin;

use App\Entity\Evenement;
use App\Form\CompoEvenementType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\ComparisonType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EvenementCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Evenement::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            // IdField::new('id'),
            TextField::new('nom', 'Nom'),
            DateField::new('dateEvenement'),
            TextField::new('lieu'),
            TextField::new('persoContact'),
            TextField::new('telephone'),
            TextField::new('email'),
            TextField::new('horaire'),
            TextField::new('description'),
            AssociationField::new('typeEvenement'),
            AssociationField::new('prestataires'),
            AssociationField::new('couleurs'),
            CollectionField::new('compos')
            ->allowAdd(true)
            ->allowDelete(true)
            ->setEntryType(CompoEvenementType::class)

            // CollectionField::new('couleurs')
            // ->allowAdd(true)
            // ->allowDelete(true)
            // ->setEntryType(MoodboardType::class),

        ];
    }
    
    public function configureActions(Actions $actions): Actions
    {
        return $actions
        ->add(Crud::PAGE_INDEX, Action::DETAIL);
        
    }

    public function configureFilters(Filters $filters): Filters
    {
        return parent::configureFilters($filters)
            ->add(EntityFilter::new('typeEvenement')->setFormTypeOptions([
                'comparison_type' => HiddenType::class,
                'comparison_type_options' => ['data' => ComparisonType::EQ],
            ]))
            
            ;
        
    }
}
