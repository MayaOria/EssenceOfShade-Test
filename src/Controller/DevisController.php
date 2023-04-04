<?php

namespace App\Controller;

use App\Entity\Devis;
use App\Entity\Evenement;
use App\Repository\DevisRepository;
use App\Repository\EvenementRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
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
        return $this->render('devis/shopping_liste.html.twig', $vars);
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

    #[Route('/telecharger/devis/client', name: 'app_telecharger_devis')]

    public function telechargerDevis(Devis $devis, DevisRepository $repo): BinaryFileResponse
{
    
    $id = $devis->getId();
        $devis = $repo->find($id);
        $document = $devis->getDocument();
        $nom = $devis->getEvenement();
    // load the file from the filesystem
    $file = new File('C:\xampp\htdocs\repo\Symfony_Projet\ProjetEssenceBeta\public\upload\images\devis\Convention_de_stage - Orianne Maya.pdf');

    return $this->file($file);

    // rename the downloaded file
    return $this->file($file, 'devis.pdf');

    // display the file contents in the browser instead of downloading it
    return $this->file('devis.pdf', 'devis.pdf', ResponseHeaderBag::DISPOSITION_INLINE);
}

public function download(): BinaryFileResponse
{
    // load the file from the filesystem
    $file = new File('/path/to/some_file.pdf');

    return $this->file($file);

    // rename the downloaded file
    return $this->file($file, 'custom_name.pdf');

    // display the file contents in the browser instead of downloading it
    return $this->file('invoice_3241.pdf', 'my_invoice.pdf', ResponseHeaderBag::DISPOSITION_INLINE);
}

}
