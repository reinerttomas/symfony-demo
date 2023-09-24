<?php

declare(strict_types=1);

namespace App\Message;

use App\Entity\Product;

final class ChangeProductPriceMessage
{
    public function __construct(
        public readonly int $productId,
        public readonly int $percentDifference,
    ) {
    }

    public static function from(Product $product, int $percentDifference): self
    {
        return new self($product->getId(), $percentDifference);
    }
}
