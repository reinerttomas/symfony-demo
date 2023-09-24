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
                $data['name'],
                $data['price'],
            );

            $manager->persist($product);
        }

        $manager->flush();
    }

    /**
     * @return iterable<array{name: string, price: int}>
     *
     * @throws \Exception
     */
    private function getData(): iterable
    {
        yield [
            'name' => 'iPhone 9',
            'price' => random_int(100, 1000),
        ];

        yield [
            'name' => 'iPhone X',
            'price' => random_int(100, 1000),
        ];

        yield [
            'name' => 'Samsung Universe 9',
            'price' => random_int(100, 1000),
        ];

        yield [
            'name' => 'OPPOF19"',
            'price' => random_int(100, 1000),
        ];

        yield [
            'name' => 'Huawei P30',
            'price' => random_int(100, 1000),
        ];

        yield [
            'name' => 'Samsung Galaxy Book',
            'price' => random_int(100, 1000),
        ];

        yield [
            'name' => 'Microsoft Surface Laptop 4',
            'price' => random_int(100, 1000),
        ];

        yield [
            'name' => 'Infinix INBOOK',
            'price' => random_int(100, 1000),
        ];

        yield [
            'name' => 'P Pavilion 15-DK1056WM',
            'price' => random_int(100, 1000),
        ];

        yield [
            'name' => 'Non-Alcoholic Concentrated Perfume Oil',
            'price' => random_int(100, 1000),
        ];
    }
}
