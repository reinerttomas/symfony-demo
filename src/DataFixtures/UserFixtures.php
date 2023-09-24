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
     * @return iterable<array{
     *      firstName: string,
     *      lastName: string,
     *      age: int,
     *      gender: string,
     *      email: string
     *  }>
     */
    private function getData(): iterable
    {
        return json_decode(file_get_contents(__DIR__ . '/data/users.json'), true);
    }
}
