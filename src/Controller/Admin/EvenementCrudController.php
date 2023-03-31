<?php

namespace App\Controller\Admin;

use App\Entity\Evenement;
use App\Form\CompoEvenementType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\ComparisonType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EvenementCrudController extends AbstractCrudController
{
    public const ACTION_DEVIS = 'genererDevis';

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
            AssociationField::new('typeEvenement'),
            AssociationField::new('prestataires'),
            AssociationField::new('couleurs'),
            CollectionField::new('compos')
            ->allowAdd(true)
            ->allowDelete(true)
            ->setEntryType(CompoEvenementType::class)

            // CollectionField::new('couleurs')
            // ->allowAdd(true)
            // ->allowDelete(true)
            // ->setEntryType(MoodboardType::class),

        ];
    }
    
    public function configureActions(Actions $actions): Actions
    {
        $genererDevis = Action::new(self::ACTION_DEVIS, 'Générer un devis', 'fa fa-file-invoice')
        ->linkToRoute('app_devis', function (Evenement $event): array
        {
            return ['id' => $event->getId()];
        })
        ->setCssClass('btn btn-info');
        return $actions
        ->add(Crud::PAGE_INDEX, Action::DETAIL)
        ->add(Crud::PAGE_DETAIL, $genererDevis);
    }


    public function configureFilters(Filters $filters): Filters
    {
        return parent::configureFilters($filters)
            ->add(EntityFilter::new('typeEvenement')->setFormTypeOptions([
                'comparison_type' => HiddenType::class,
                'comparison_type_options' => ['data' => ComparisonType::EQ],
            ]))
            
            ;
        
    }

//     public function getDevis(): response
//     {
        

//         $res = [];
// //pour chaque "CompoEvenement" d'un événement  
//         foreach($this->compos as $compo)
//         {
//             //pour retyper quand on perd l'autocomplétion
//             /** @var CompoEvenement $compo */
//             //récupère les "FleurCompo" qui sont dans la composition de la "CompoEvenement"
//             foreach($compo->getComposition()->getFleursCompo() as $fleurCompo){
//                 //Vérifie si la fleur de la "fleurCompo" est déjà dans le tableau 
//                 $line = current(array_filter($res, function($item) use($fleurCompo) {
//                     return $item->getFleur() === $fleurCompo->getFleur();
//                 }));
//                 //La quantité de la fleur sera la quantité necessaire dans la compo * le nombre de compo necessaire
//                 $quantity = $fleurCompo->getQuantite() * $compo->getQuantite();
//                 //Si la combinaison fleur n'est déjà dans le tableau
//                 if(!$line){
//                     //ajoute la combinaison et set la quantité
//                     $res[] = $fleurCompo->setQuantite($quantity);
//                 }
    
//                 else {
//                     //sinon, on set la quantité
//                     $line->setQuantite($line->getQuantite() + $quantity);
//                 }
//             }
//         }

//         // dd($res);
//         return $res;
//     }
}
