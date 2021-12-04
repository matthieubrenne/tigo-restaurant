<?php

namespace App\Controller;

use App\Entity\Gallery;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GalleryController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/gallerie", name="gallery")
     */
    public function index(): Response
    {
        $image = $this->entityManager->getRepository(Gallery::class)->findAll();

        return $this->render('gallery/index.html.twig', [
            'image' => $image
        ]);
    }
}
