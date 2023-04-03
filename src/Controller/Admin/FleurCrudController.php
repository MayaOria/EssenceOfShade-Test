<?php

namespace App\Controller\Admin;

use App\Entity\Fleur;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use Symfony\Component\Translation\TranslatableMessage;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\ChoiceFilter;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\ComparisonType;
use EasyCorp\Bundle\EasyAdminBundle\Contracts\Filter\FilterInterface;
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
           NumberField::new('prix'),
            ImageField::new('image')
                ->setBasePath(self::FLEUR_BASE_PATH)
                ->setUploadDir(self::FLEUR_UPLOAD_DIR)
                ->setSortable(false),
            AssociationField::new('couleurFleur', new TranslatableMessage('Couleur'))->autocomplete(),
            AssociationField::new('modeVente', new TranslatableMessage('Mode de vente')),
            AssociationField::new('conditionnement', new TranslatableMessage('Vendu par ')),
            AssociationField::new('saisons', new TranslatableMessage('Saisons')),
            TextField::new('remarques', new TranslatableMessage('Variété préférée')),
            // AssociationField::new('user')->hideOnForm()
            
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        
        

        return $actions

        ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
            return $action->setIcon('fa fa-plus')->setLabel(false);
        })
        ->add(Crud::PAGE_INDEX , Action::DETAIL, 'détails');
        
        
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            // ...
            ->showEntityActionsInlined()
        ;
    }

    public function configureFilters(Filters $filters): Filters
    {
        return parent::configureFilters($filters)
            ->add(EntityFilter::new('couleurFleur')->setFormTypeOptions([
                'comparison_type' => HiddenType::class,
                'comparison_type_options' => ['data' => ComparisonType::EQ],
            ]))
            ->add(EntityFilter::new('modeVente')->setFormTypeOptions([
                'comparison_type' => HiddenType::class,
                'comparison_type_options' => ['data' => ComparisonType::EQ],
            ]))
            ->add(EntityFilter::new('conditionnement')->setFormTypeOptions([
                'comparison_type' => HiddenType::class,
                'comparison_type_options' => ['data' => ComparisonType::EQ],
            ]))
            ->add(EntityFilter::new('saisons')->setFormTypeOptions([
                'comparison_type' => HiddenType::class,
                'comparison_type_options' => ['data' => ComparisonType::EQ],
            ]))
            ;
        
    }
    
    
}
