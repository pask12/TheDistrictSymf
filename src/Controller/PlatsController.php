<?php

namespace App\Controller;

use App\Repository\PlatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
        dd($plats);
        return $this->render('plats/index.html.twig', [
            'plats' => $plats,
          ]);

    }

    #[Route(['/truc/{motcle}'], name: 'app_plats_recherche', defaults: ['motcle' => NULL]),]
    //#[Route(['/plats/recherche/{motcle}'], name: 'app_plats_recherche', defaults: ['motcle' => NULL]),]
    public function recherchePlats(Request $request, PlatRepository $platRepository, $motcle): Response
    {

        //$motcle = $request->query->get('motcle');
        //dd($motcle);

        $plats = $platRepository->recherchePlats($motcle);

        //dd($plats);

        //return $this->render('plats/recherche.html.twig', [
          return $this->render('plats/index.html.twig', [

            'plats' => $plats,

        ]);
    }
}
