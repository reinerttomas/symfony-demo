<?php

namespace App\Entity;

use App\Enum\Gender;
use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(length: 255)]
    private string $firstName;

    #[ORM\Column(length: 255)]
    private string $lastName;

    #[ORM\Column]
    private int $age;

    #[ORM\Column(enumType: Gender::class)]
    private Gender $gender;

    #[ORM\Column(length: 255, unique: true)]
    private string $email;

    public function __construct(
        string $firstName,
        string $lastName,
        int $age,
        Gender $gender,
        string $email,
    ) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->age = $age;
        $this->gender = $gender;
        $this->email = $email;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setName(string $firstName, string $lastName): User
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;

        return $this;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function setAge(int $age): User
    {
        $this->age = $age;

        return $this;
    }

    public function getGender(): Gender
    {
        return $this->gender;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): User
    {
        $this->email = $email;

        return $this;
    }
}
