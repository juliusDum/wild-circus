<?php

namespace App\Controller;


use App\Repository\CircusRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CircusController extends AbstractController
{
    /**
     * @Route("/circus", name="circus")
     * @param CircusRepository $circusRepository
     * @return Response
     */
    public function circus(CircusRepository $circusRepository): Response
    {
        return $this->render('Home/circus.html.twig', [
            'circus' => $circusRepository->findAll(),
            ]);
    }
}