<?php

namespace App\Repository;

use App\Entity\Product;
use App\Exception\NotFoundException;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Product>
 *
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    /**
     * @throws NotFoundException
     */
    public function get(int $id): Product
    {
        $product = $this->find($id);

        if ($product === null) {
            throw NotFoundException::new()->withMessage('Product not found. ID: ' . $id);
        }

        return $product;
    }

    public function store(Product $product): void
    {
        $em = $this->getEntityManager();

        $em->persist($product);
        $em->flush();
    }
}
