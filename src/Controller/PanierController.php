<?php

namespace App\Controller;

use App\Repository\DetailRepository;
use App\Repository\PlatRepository;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;



class PanierController extends AbstractController
{
    #[Route('/panier', name: 'app_panier')]

    public function index(SessionInterface $session, PlatRepository $platRepository,): Response
    // {
    //     return $this->render('panier/index.html.twig', [
    //         'controller_name' => 'PanierController',
    //     ]);
    // }

    {
        $panier = $session->get('panier', []);

        $panierWithData = [];

        foreach ($panier as $id => $quantite) {
            $panierWithData[] = [
                'plat' =>  $platRepository->find($id),
                'quantite' => $quantite
            ];
        }

        $total = 0;

        foreach ($panierWithData as $item) {
            $totalItem = $item['plat']->getprix() * $item['quantite'];
            $total += $totalItem;
        }


        // dd($panierWithData);

        return $this->render('panier/index.html.twig', [
            'controller_name' => 'PanierController',
            'items' => $panierWithData,
            'total' => $total
        ]);
    }



    #[Route('/panier/add/{id}', name: 'app_panier_add')]

    // public function add(int $id, Request $request){
    public function add(int $id, SessionInterface $session)
    {

        // $session= $request->getSession();

        $panier = $session->get('panier', []);

        if (!empty($panier[$id])) {
            $panier[$id]++;
        } else {
            $panier[$id] = 1;
        }



        $session->set('panier', $panier);

        return $this->redirectToRoute('app_panier');

        // dd($session->get('panier'));
        // return $this->render('accueil/index.html.twig', [
        //     'controller_name' => 'AccueilController',
        // ]);
    }


    #[Route('/panier/remove/{id}', name: 'app_panier_remove')]

    public function remove($id, SessionInterface $session)
    {

        $panier = $session->get('panier', []);

        if (!empty($panier[$id])) {
            $panier[$id]--;
        } else {   

            unset($panier[$id]);
        }
        $session->set('panier', $panier);


        return $this->redirectToRoute('app_panier');
        // return $this->render('panier/index.html.twig');

    }

    #[Route('/panier/supprimer/{id}', name: 'app_panier_supprimer')]

    public function supprimer($id, SessionInterface $session)
    {

        $panier = $session->get('panier', []);

        if (!empty($panier[$id])) {
            unset($panier[$id]);
        }
        $session->set('panier', $panier);


        return $this->redirectToRoute('app_panier');
        // return $this->render('panier/index.html.twig');

    }
    
}
