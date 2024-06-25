<?php

namespace App\Controller;

use App\Repository\PlatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PlatsController extends AbstractController
{
    #[Route('/plats', name: 'app_plats')]
    public function index(PlatRepository $platRepository): Response
    {
        $plats = $platRepository->findAll();
        return $this->render('plats/index.html.twig', [
            'controller_name' => 'PlatsController',
            'plats' => $plats,
        ]);
    }

    #[Route('/plats/{categorie_id}')]
    public function plats_par_categorie(PlatRepository $platRepository, $categorie_id): Response
    {
        $plats = $platRepository->findByCategorie($categorie_id);
        return $this->render('plats/index.html.twig', [
            'plats' => $plats,
        ]);
    }
}
