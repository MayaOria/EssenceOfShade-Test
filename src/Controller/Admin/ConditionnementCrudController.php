<?php

namespace App\Controller\Admin;

use App\Entity\Conditionnement;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ConditionnementCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Conditionnement::class;
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
