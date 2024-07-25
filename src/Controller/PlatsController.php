<?php

namespace App\Controller;

use App\Repository\PlatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

use function PHPUnit\Framework\isNull;

class PlatsController extends AbstractController
{
    #[Route(['/plats', '/plats/{categorie_id}'], name: 'app_plats', defaults: ['categorie_id' => NULL]),]
    public function index(PlatRepository $platRepository, $categorie_id): Response
    {
        if ($categorie_id === NULL) {
          $plats = $platRepository->findAll();
        } else {
          $plats = $platRepository->findByCategorie($categorie_id);
        }

        return $this->render('plats/index.html.twig', [
            'plats' => $plats,
          ]);

    }
    
}
