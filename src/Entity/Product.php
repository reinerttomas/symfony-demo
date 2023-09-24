<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(length: 255)]
    private string $title;

    #[ORM\Column(length: 255)]
    private string $description;

    #[ORM\Column]
    private int $price;

    #[ORM\Column]
    private int $discountPercentage;

    #[ORM\Column]
    private int $rating;

    #[ORM\Column]
    private int $stock;

    #[ORM\Column(length: 255)]
    private string $brand;

    #[ORM\Column(length: 255)]
    private string $category;

    public function __construct(
        string $title,
        string $description,
        int $price,
        int $discountPercentage,
        int $rating,
        int $stock,
        string $brand,
        string $category,
    ) {
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
        $this->discountPercentage = $discountPercentage;
        $this->rating = $rating;
        $this->stock = $stock;
        $this->brand = $brand;
        $this->category = $category;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): float
    {
        return (float) ($this->price / 100);
    }

    public function setPrice(float $price): self
    {
        $this->price = (int) ($price * 100);

        return $this;
    }

    public function getDiscountPercentage(): float
    {
        return (float) ($this->discountPercentage / 100);
    }

    public function setDiscountPercentage(float $discountPercentage): self
    {
        $this->discountPercentage = (int) ($discountPercentage * 100);

        return $this;
    }

    public function getRating(): float
    {
        return (float) ($this->rating / 100);
    }

    public function setRating(float $rating): self
    {
        $this->rating = (int) ($rating * 100);

        return $this;
    }

    public function getStock(): int
    {
        return $this->stock;
    }

    public function setStock(int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }
}
