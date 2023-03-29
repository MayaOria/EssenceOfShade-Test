<?php

namespace App\Controller\Admin;

use App\Entity\TypeCompo;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TypeCompoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TypeCompo::class;
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
