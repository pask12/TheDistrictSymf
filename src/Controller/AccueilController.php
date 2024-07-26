<?php

namespace App\Controller;

use App\Repository\PlatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AccueilController extends AbstractController
{
    // #[Route('/', name: 'app_accueil')]
    // public function index(): Response
    // {
    //     return $this->render('accueil/index.html.twig', [
    //         'controller_name' => 'AccueilController',
    //     ]);
    // }


    #[Route('/', name: 'app_accueil')]
    public function findByVentes(PlatRepository $platRepository): Response
    {

        $plats = $platRepository->findByVentes(1);
        // dd($plats);

        return $this->render('accueil/index.html.twig', [
            'findByVentes' => $plats,
        ]);
    }
}



