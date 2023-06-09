<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'accueil')]
    public function index(): Response
    {
        return $this->redirectToRoute('app_login');
        
        // $user = $this->getUser();
        // $vars = ['user' => $user];

        // return $this->render('home/index.html.twig', $vars);
    }
}
