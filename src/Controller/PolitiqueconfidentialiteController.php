<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PolitiqueconfidentialiteController extends AbstractController
{
    #[Route('/politiqueconfidentialite', name: 'app_politiqueconfidentialite')]
    public function index(): Response
    {
        return $this->render('politiqueconfidentialite/index.html.twig', [
            'controller_name' => 'PolitiqueconfidentialiteController',
        ]);
    }
}
