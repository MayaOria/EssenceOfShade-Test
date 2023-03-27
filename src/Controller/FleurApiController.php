<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use App\Repository\FleurRepository;
use App\Repository\SaisonRepository;
use App\Repository\ModeVenteRepository;
use App\Repository\CouleurFleurRepository;
use App\Repository\ConditionnementRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FleurApiController extends AbstractController
{
    #[Route('/api/fleurs/', name : 'api')]
    public function getAll(FleurRepository $repoFleur, CouleurFleurRepository $repoCouleur, ModeVenteRepository $repoModeVente, ConditionnementRepository $repoConditionnement, SaisonRepository $repoSaison): Response
    {
        // dd($id);
        
        $fleurs = $repoFleur->findAll();   
        $res = [];       
        foreach ($fleurs as $fleur){
           
            $couleur = $repoCouleur->findBy(['id' => $fleur->getCouleurFleur()])[0]->getNom();
            
            $modeVente = $repoModeVente->findBy(['id' => $fleur->getModeVente()])[0]->getNom();
            $conditionnement = $repoConditionnement->findBy(['id' => $fleur->getConditionnement()])[0]->getNombre();
            $saisons = $fleur->getSaisons();
            $Arrsaisons= [];
            $i=0;
            foreach ($saisons as $saison)
            {
                $Arrsaisons[$i]=$saison->getMois();
                $i++;
            }
            $res[] = ['id' => $fleur->getId(),
                      'nom' => $fleur->getNom(),
                      'prix' => $fleur->getPrix(),
                      'image' => $fleur->getImage(),
                      'remarques' => $fleur->getRemarques(),
                      'couleur' => $couleur,
                      'modevente' => $modeVente,
                      'conditionnement' => $conditionnement,
                      'saisons' =>$Arrsaisons
        ];};
        return $this->json($res);
    }
}
