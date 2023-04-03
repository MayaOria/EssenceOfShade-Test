<?php

namespace App\Controller;

use App\Entity\Evenement;
use App\Repository\EvenementRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DevisController extends AbstractController
{
    #[Route('/devis', name: 'app_devis')]
    public function genererDevis (Evenement $event, EvenementRepository $repo): Response
    {
        
        $id = $event->getId();
        $evenement = $repo->find($id);
        $devis = $evenement->getDevis();
        $vars = ['devis' => $devis];
        // dd($devis);
        return $this->render('devis/index.html.twig', $vars);
    }

    #[Route('/devis/client', name: 'app_devis_client')]
    public function genererDevisClient(Evenement $event, EvenementRepository $repo): Response
    
    {
        $id = $event->getId();
        $evenement = $repo->find($id);
        $devis = $evenement->getDevisClient();
        $evenement = $evenement;
        $vars = ['devis' => $devis,
                 'evenement' => $evenement];
        

        return $this->render('devis/devis_client.html.twig', $vars);

    }
}
