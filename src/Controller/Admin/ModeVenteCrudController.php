<?php

namespace App\Controller\Admin;

use App\Entity\ModeVente;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ModeVenteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ModeVente::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            
            TextField::new('nom', 'Mode de vente'),
            
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            // ...
            ->showEntityActionsInlined()
        ;
    }
    
}
