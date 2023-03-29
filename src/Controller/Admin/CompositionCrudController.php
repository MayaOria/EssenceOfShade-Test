<?php

namespace App\Controller\Admin;

use App\Entity\FleurCompo;
use App\Entity\Composition;
use App\Form\FleurCompoType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CompositionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Composition::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            // IdField::new('id'),
            TextField::new('nom'),
            AssociationField::new('typeCompo'),
            CollectionField::new('FleursCompo')
            ->allowAdd(true)
            ->allowDelete(true)
            ->setEntryType(FleurCompoType::class)
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
        ->add(Crud::PAGE_INDEX, Action::DETAIL);
        
    }
    
}
