<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PssessionController extends AbstractController
{
    #[Route('/possession', name: 'app_possession')]
    public function index(): Response
    {
        return $this->render('possession/index.html.twig', [
            'controller_name' => 'PossessionController',
        ]);
    }
}
