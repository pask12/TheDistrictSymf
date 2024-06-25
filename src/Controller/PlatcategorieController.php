<?php

namespace App\Controller;

use App\Repository\PlatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PlatcategorieController extends AbstractController
{
    #[Route('/platcategorie/{categorie_id}', name: 'app_plat')]
    public function index(PlatRepository $platRepository, $categorie_id): Response
    {
        $plats = $platRepository->findByCategorie($categorie_id);
        return $this->render('platcategorie/index.html.twig', [
            'controller_name' => 'PlatcategorieController',
            'plats' => $plats,
        ]);
    }
}
