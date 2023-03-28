<?php

namespace App\Controller\Admin;

use App\Entity\Saison;
use App\Entity\ModeVente;
use App\Entity\CouleurFleur;
use App\Entity\Conditionnement;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use App\Entity\Fleur;

class DashboardController extends AbstractDashboardController
{

    
    public function __construct(private AdminUrlGenerator $adminUrlGenerator)
    {        
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator->setController(ConditionnementCrudController::class)
                                       ->generateUrl();
        
        return $this->redirect($url);                               // return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('ProjetEssenceBeta');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('FLEURS', 'fa-solid fa-leaf');

        yield MenuItem::subMenu('fleurs', 'fas fa-list')->setSubItems(
            [MenuItem::linkToCrud('Ajouter une fleur', 'fas fa-plus', Fleur::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Listing', 'fas fa-eye', Fleur::class)]);

        yield MenuItem::subMenu('Conditionnement', 'fas fa-list')->setSubItems(
        [MenuItem::linkToCrud('Ajouter un conditionnement', 'fas fa-plus', Conditionnement::class)->setAction(Crud::PAGE_NEW),
        MenuItem::linkToCrud('Listing', 'fas fa-eye', Conditionnement::class)]);

        yield MenuItem::subMenu('Couleur', 'fas fa-list')->setSubItems(
        [MenuItem::linkToCrud('Ajouter une couleur', 'fas fa-plus', CouleurFleur::class)->setAction(Crud::PAGE_NEW),
        MenuItem::linkToCrud('Listing', 'fas fa-eye', CouleurFleur::class)]);

        yield MenuItem::subMenu('Mode de vente', 'fas fa-list')->setSubItems(
        [MenuItem::linkToCrud('Ajouter un mode de vente', 'fas fa-plus', ModeVente::class)->setAction(Crud::PAGE_NEW),
        MenuItem::linkToCrud('Listing', 'fas fa-eye', ModeVente::class)]);

        yield MenuItem::subMenu('Saisons', 'fas fa-list')->setSubItems(
            [MenuItem::linkToCrud('Ajouter une saison', 'fas fa-plus', Saison::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Listing', 'fas fa-eye', Saison::class)]);

        yield MenuItem::section('COMPOSITIONS', 'fa-solid fa-book');
        yield MenuItem::section('ÉVÈNEMENTS', 'fa-solid fa-calendar');
        yield MenuItem::section('DEVIS', 'fa-solid fa-file');

        


        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }

    
}
