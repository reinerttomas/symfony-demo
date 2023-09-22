<?php
declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\User;
use App\Enum\Gender;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        foreach ($this->getData() as $data) {
            $product = new User(
                $data['firstName'],
                $data['lastName'],
                $data['age'],
                Gender::from($data['gender']),
                $data['email'],
            );

            $manager->persist($product);
        }

        $manager->flush();
    }

    /**
     * @return iterable<array{firstName: string, lastName: string, age: int, gender: string, email: string}>
     */
    private function getData(): iterable
    {
        yield [
            'firstName' => 'John',
            'lastName' => 'Smith',
            'age' => 28,
            'gender' => 'male',
            'email' => 'john.smith@example.com',
        ];

        yield [
            'firstName' => 'Emily',
            'lastName' => 'Johnson',
            'age' => 32,
            'gender' => 'female',
            'email' => 'emily.johnson@example.com',
        ];

        yield [
            'firstName' => 'Michael',
            'lastName' => 'Brown',
            'age' => 25,
            'gender' => 'male',
            'email' => 'michael.brown@example.com',
        ];

        yield [
            'firstName' => 'Sarah',
            'lastName' => 'Davis',
            'age' => 29,
            'gender' => 'female',
            'email' => 'sarah.davis@example.com',
        ];

        yield [
            'firstName' => 'David',
            'lastName' => 'Wilson',
            'age' => 35,
            'gender' => 'male',
            'email' => 'david.wilson@example.com',
        ];

        yield [
            'firstName' => 'Olivia',
            'lastName' => 'Martinez',
            'age' => 27,
            'gender' => 'female',
            'email' => 'olivia.martinez@example.com',
        ];

        yield [
            'firstName' => 'Benjamin',
            'lastName' => 'Anderson',
            'age' => 31,
            'gender' => 'male',
            'email' => 'benjamin.anderson@example.com',
        ];

        yield [
            'firstName' => 'Sophia',
            'lastName' => 'White',
            'age' => 24,
            'gender' => 'female',
            'email' => 'sophia.white@example.com',
        ];

        yield [
            'firstName' => 'William',
            'lastName' => 'Lee',
            'age' => 33,
            'gender' => 'male',
            'email' => 'william.lee@example.com',
        ];

        yield [
            'firstName' => 'Ava',
            'lastName' => 'Garcia',
            'age' => 30,
            'gender' => 'female',
            'email' => 'ava.garcia@example.com',
        ];
    }
}
