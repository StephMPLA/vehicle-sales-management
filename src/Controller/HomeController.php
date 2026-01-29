<?php

namespace App\Controller;

use App\Repository\ModelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ModelRepository $modelRepository): Response
    {
        //Envoin le nombre de voiture en magasin
            $vehicles = $modelRepository->findAll();

        $vehicleCount  = $modelRepository->count([]);     

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'vehicleCount'=> $vehicleCount,
            'vehicles' => $vehicles,
        ]);
    }
}
