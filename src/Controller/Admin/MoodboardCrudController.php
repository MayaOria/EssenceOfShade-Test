<?php

namespace App\Controller\Admin;

use App\Entity\Moodboard;
use EasyCorp\Bundle\EasyAdminBundle\Field\ColorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MoodboardCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Moodboard::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            ColorField::new('codeCouleur'),
            
        ];
    }
    
}
