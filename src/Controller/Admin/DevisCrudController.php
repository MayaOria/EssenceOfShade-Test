<?php

namespace App\Controller\Admin;

use App\Entity\Devis;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\FileUploadType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DevisCrudController extends AbstractCrudController
{
    public const ACTION_DEVIS = 'telechargerDevis';
    public const DEVIS_BASE_PATH = 'upload/images/devis';
    public const DEVIS_UPLOAD_DIR = 'public/upload/images/devis';

    public static function getEntityFqcn(): string
    {
        return Devis::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new("evenement", "Nom de l'évènement"),
            DateField::new('dateDevis', 'Date'),
            TextareaField::new('remarques', 'Remarques'),
            ImageField::new('document', 'Document')
                ->setBasePath(self::DEVIS_BASE_PATH)
                ->setUploadDir(self::DEVIS_UPLOAD_DIR)
                ->setSortable(false)
                ->setFormType(FileUploadType::class)
                ->hideOnIndex()
                ->hideOnDetail()
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        $telechargerDevis = Action::new(self::ACTION_DEVIS, 'Télécharger', 'fa fa-file')
        ->linkToRoute('app_telecharger_devis', function (Devis $devis): array
        {
            return ['id' => $devis->getId()];
        })
        ->setCssClass('btn btn-info');

        
        
        return $actions
        ->add(Crud::PAGE_INDEX, Action::DETAIL)
        ->add(Crud::PAGE_DETAIL, $telechargerDevis);
        

    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            // ...
            ->showEntityActionsInlined()
        ;
    }
    
}
