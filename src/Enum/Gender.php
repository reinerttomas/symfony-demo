<?php

declare(strict_types=1);

namespace App\Enum;

enum Gender: string
{
    case MALE = 'male';
    case FEMALE = 'female';

    public function text(): string
    {
        return match ($this) {
            self::MALE => 'Male',
            self::FEMALE => 'Female',
        };
    }
}
