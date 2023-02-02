<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\ProductRepository;

class ProductController extends AbstractController
{

    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    #[Route('/product/slug/{productname}', name: 'product.detail')]
    public function detail(string $productname):Response
    {
        $produits = $this->productRepository->findBy(['slug' => $productname])[0];

        $titre = "detail du produit : ";
        
        return $this->render('product/product.html.twig', ['titre' => $titre, 'product' => $produits]);
    }

    #[Route('/products', name: 'product.index')]
    public function index():Response
    {
        $produits = $this->productRepository->findAll();
        return $this->render('index.html.twig', ['products' => $produits]);
    }

    
}