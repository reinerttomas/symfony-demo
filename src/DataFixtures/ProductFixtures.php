<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        foreach ($this->getData() as $data) {
            $product = new Product(
                $data['title'],
                $data['description'],
                (int) ($data['price'] * 100),
                (int) ($data['discountPercentage'] * 100),
                (int) ($data['rating'] * 100),
                $data['stock'],
                $data['brand'],
                $data['category'],
            );

            $manager->persist($product);
        }

        $manager->flush();
    }

    /**
     * @return iterable<array{
     *      id: int,
     *      title: string,
     *      description: string,
     *      price: float,
     *      discountPercentage: float,
     *      rating: float,
     *      stock: int,
     *      brand: string,
     *      category: string,
     *      thumbnail: string,
     *      images: array<string>
     *  }>
     */
    private function getData(): iterable
    {
        return json_decode(file_get_contents(__DIR__ . '/data/products.json'), true);
    }
}
