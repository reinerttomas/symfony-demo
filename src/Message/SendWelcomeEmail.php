<?php

namespace App\Message;

use App\Entity\User;

final class SendWelcomeEmail
{
    public function __construct(public readonly int $userId)
    {
    }

    public static function from(User $user): SendWelcomeEmail
    {
        return new SendWelcomeEmail($user->getId());
    }
}
