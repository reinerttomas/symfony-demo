<?php

declare(strict_types=1);

namespace App\Service;

class ProductService
{
    public function calculatePrice(float $price, int $percentDifference): float
    {
        $priceDifference = (abs($percentDifference) / 100) * $price;

        if ($percentDifference > 0) {
            $newPrice = $price + $priceDifference;
        } else {
            $newPrice = $price - $priceDifference;
        }

        return $newPrice;
    }
}
