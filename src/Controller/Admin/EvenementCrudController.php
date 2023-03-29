<?php

namespace App\Controller\Admin;

use App\Entity\Evenement;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
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

        ];
    }
    
}
