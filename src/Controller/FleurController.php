<?php

namespace App\Controller;

use App\Repository\FleurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FleurController extends AbstractController
{
    #[Route('/fleur', name: 'app_fleur')]
    public function index(FleurRepository $repo): Response
    {
        $fleurs = $repo->findAll();
        $vars = ['fleurs' => $fleurs];
        
        return $this->render('fleur/index.html.twig', $vars);
    }
}
