<?php

declare(strict_types=1);

namespace App\Action;

use App\Entity\Product;
use App\Repository\ProductRepository;
use App\Service\ProductService;

class ChangeProductPriceAction
{
    public function __construct(
        private readonly ProductRepository $productRepository,
        private readonly ProductService $productService,
    ) {
    }

    public function execute(Product $product, int $percentDifference): void
    {
        $newPrice = $this->productService->calculatePrice($product->getPrice(), $percentDifference);
        $product->setPrice($newPrice);
        $this->productRepository->store($product);
    }
}
