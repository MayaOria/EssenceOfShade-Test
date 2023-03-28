<?php

namespace App\Controller\Admin;

use App\Entity\ModeVente;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ModeVenteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ModeVente::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
