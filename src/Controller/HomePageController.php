<?php

namespace App\Controller; 

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\ProductRepository;

class HomePageController extends AbstractController 
{
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    #[Route('/', name: 'homepage.index')]
    public function index():Response
    {
        $titre = "detail du produit : ";
        $produits = $this->productRepository->randomProducts(); 
        #dd($produits);
        return $this->render('HomePage/index.html.twig', ['titre' => $titre, 'products' => $produits]);
    }
}