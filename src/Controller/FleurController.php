<?php

namespace App\Controller;

use App\Entity\Fleur;
use App\Form\FleurType;
use App\Form\SaisonType;
use App\Form\ModeVenteType;
use App\Form\CouleurFleurType;
use App\Form\ConditionnementType;
use App\Repository\FleurRepository;
use App\Repository\SaisonRepository;
use App\Repository\ModeVenteRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Repository\CouleurFleurRepository;
use App\Repository\ConditionnementRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FleurController extends AbstractController
{
    #[Route('/fleur', name: 'app_fleur')]
    public function index(FleurRepository $repoFleur, CouleurFleurRepository $repoCouleur, ModeVenteRepository $repoModeVente, ConditionnementRepository $repoConditionnement, SaisonRepository $repoSaison): Response
    {
        $fleurs = $repoFleur->findAll();
        $couleurs = $repoCouleur->findAll();
        $modeVentes = $repoModeVente->findAll();
        $conditionnements = $repoConditionnement->findAll();
        $saisons = $repoSaison->findAll();

        $formCouleur = $this->createForm(CouleurFleurType::class, $couleurs);
        $formModeVente = $this->createForm(ModeVenteType::class, $modeVentes);
        $formConditionnements = $this->createForm(ConditionnementType::class, $conditionnements);
        $formSaisons = $this->createForm(SaisonType::class, $saisons);

        $vars = ['fleurs' => $fleurs,
                 'formCouleur' => $formCouleur,
                 'formModeVente' => $formModeVente,
                 'formConditionnements' => $formConditionnements,
                 'formSaisons' => $formSaisons,
                 ];
        
        return $this->render('fleur/index.html.twig', $vars);
    }

    #[Route('/formulaire/creation/fleur')]
    public function CreationFleur(Request $req, ManagerRegistry $doctrine): Response 
    {
        $fleur = new Fleur();
        $formFleur = $this->createForm(FleurType::class,$fleur);
        $formFleur->handleRequest($req);

        if($formFleur->isSubmitted()){

            $em = $doctrine->getManager();
            //On associe le user à la fleur qu'on crée
            $fleur->setUser($this->getUser());
   
            $em->persist($fleur);
            $em->flush();
            
            return $this->redirectToRoute("app_fleur");
        }

        else
        {
            $vars = ['formFleur' => $formFleur->createView()];
            return $this->render('fleur/creation_fleur.html.twig', $vars);
        }

    }

    #[Route('/fleur/update/{id}', name:'fleur_update')]
    public function UpdateFleur (Fleur $fleur, Request $req, ManagerRegistry $doctrine): Response 
    {
        
        $formFleur = $this->createForm(FleurType::class, $fleur);
        $formFleur->handleRequest($req);

        if($formFleur->isSubmitted()){

            $em = $doctrine->getManager();
            //On associe le user à la fleur qu'on crée
            $fleur->setUser($this->getUser());
   
            $em->persist($fleur);
            $em->flush();
            
            return $this->redirectToRoute("app_fleur");
        }

        else
        {
            $vars = ['formFleur' => $formFleur->createView()];
            return $this->render('fleur/creation_fleur.html.twig', $vars);
        }
            
            
            

    }

    #[Route('/fleur/delete/{id}', name:'fleur_delete')]
    public function DeleteFleur (Request $req, ManagerRegistry $doctrine): Response 
    {
        $id = $req->get('id');
         $em = $doctrine->getManager();
         $repository = $em->getRepository(Fleur::class);
         $fleur = $repository->findOneBy(['id' => $id]);




         $em->remove($fleur);
         $em->flush();

         return $this->redirectToRoute("app_fleur");

    }

}
