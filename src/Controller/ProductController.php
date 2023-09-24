<?php

declare(strict_types=1);

namespace App\Controller;

use App\Message\ChangeProductPriceMessage;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    public function __construct(
        private readonly ProductRepository $productRepository,
        private readonly MessageBusInterface $messageBus,
    ) {
    }

    #[Route('/products', name: 'product_list')]
    public function index(): Response
    {
        $products = $this->productRepository->findAll();

        return $this->render('product/index.html.twig', [
            'products' => $products,
        ]);
    }

    #[Route('/products/change-price/{percentDifference}', name: 'product_change_price')]
    public function changePrice(int $percentDifference): Response
    {
        $products = $this->productRepository->findAll();

        foreach ($products as $product) {
            $this->messageBus->dispatch(ChangeProductPriceMessage::from($product, $percentDifference));
        }

        $this->addFlash('success', sprintf('Products price changed by %d.', $percentDifference));

        return $this->redirectToRoute('product_list');
    }
}
