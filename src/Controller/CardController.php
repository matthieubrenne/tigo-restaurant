<?php

namespace App\Controller;

use App\Entity\Food;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CardController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/carte", name="card")
     */
    public function index(): Response
    {
        $products = $this->entityManager->getRepository(Food::class)->findAll();


        return $this->render('card/index.html.twig', [
            'products' => $products
        ]);
    }

    /**
     * @Route("/nos-kebab", name="kebab")
     */
    public function kebab(): Response
    {
        $products = $this->entityManager->getRepository(Food::class)->findAll();

        return $this->render('card/kebab.html.twig', [
            'products' => $products
        ]);
    }

    /**
     * @Route("/nos-assiettes", name="assiette")
     */
    public function assiette(): Response
    {
        $products = $this->entityManager->getRepository(Food::class)->findAll();

        return $this->render('card/assiette.html.twig', [
            'products' => $products
        ]);
    }

    /**
     * @Route("/nos-sandwichs", name="sandwich")
     */
    public function sandwich(): Response
    {
        $products = $this->entityManager->getRepository(Food::class)->findAll();

        return $this->render('card/sandwich.html.twig', [
            'products' => $products
        ]);
    }

    /**
     * @Route("/nos-burger", name="burger")
     */
    public function burger(): Response
    {
        $products = $this->entityManager->getRepository(Food::class)->findAll();

        return $this->render('card/burger.html.twig', [
            'products' => $products
        ]);
    }

    /**
     * @Route("/snacking", name="snacking")
     */
    public function snacking(): Response
    {
        $products = $this->entityManager->getRepository(Food::class)->findAll();

        return $this->render('card/snacking.html.twig', [
            'products' => $products
        ]);
    }

    /**
     * @Route("/menu-enfant", name="kids_meal")
     */
    public function kidsMeal(): Response
    {
        $products = $this->entityManager->getRepository(Food::class)->findAll();

        return $this->render('card/kidsMeal.html.twig', [
            'products' => $products
        ]);
    }
}
