<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    public function __construct(private readonly ProductRepository $productRepository)
    {
    }

    #[Route('/products', name: 'product_list')]
    public function index(): Response
    {
        $products = $this->productRepository->findAll();

        return $this->render('product/index.html.twig', [
            'products' => $products,
        ]);
    }
}
