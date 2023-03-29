<?php

namespace App\Controller\Admin;

use App\Entity\Fleur;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;


class FleurCrudController extends AbstractCrudController
{
    public const FLEUR_BASE_PATH = 'upload/images/fleurs';
    public const FLEUR_UPLOAD_DIR = 'public/upload/images/fleurs';
    public static function getEntityFqcn(): string
    {
        return Fleur::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            // IdField::new('id')->hideOnForm(),
            TextField::new('nom'),
            MoneyField::new('prix')->setCurrency('EUR'),
            ImageField::new('image')
                ->setBasePath(self::FLEUR_BASE_PATH)
                ->setUploadDir(self::FLEUR_UPLOAD_DIR)
                ->setSortable(false),
            AssociationField::new('couleurFleur')->autocomplete(),
            AssociationField::new('modeVente'),
            AssociationField::new('conditionnement'),
            AssociationField::new('saisons'),
            TextField::new('remarques'),
            AssociationField::new('user')->hideOnForm()
            
        ];
    }

    
    
}
