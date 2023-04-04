<?php

namespace App\Controller\Admin;

use App\Entity\Conditionnement;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ConditionnementCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Conditionnement::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            // ...
            ->showEntityActionsInlined()
        ;
    }
    
    public function configureFields(string $pageName): iterable
    {
        return [
            NumberField::new('nombre', 'Conditionnement'),
            
        ];
    }
    
}
