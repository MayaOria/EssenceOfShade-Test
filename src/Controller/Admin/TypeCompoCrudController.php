<?php

namespace App\Controller\Admin;

use App\Entity\TypeCompo;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TypeCompoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TypeCompo::class;
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
           
            TextField::new('nom', 'Type'),
            
        ];
    }
    
}
