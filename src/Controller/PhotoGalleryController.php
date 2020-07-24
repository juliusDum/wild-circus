<?php

namespace App\Controller;

use App\Repository\CircusRepository;
use App\Repository\PhotogalleryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class PhotoGalleryController extends AbstractController
{
    /**
     * @Route("/gallery", name="gallery_photo")
     * @param PhotogalleryRepository $photogalleryRepository
     * @return Response
     */
    public function gallery(PhotogalleryRepository $photogalleryRepository): Response
    {
        return $this->render('Home/gallery.html.twig', [
            'gallery' => $photogalleryRepository->findAll(),
        ]);
    }
}