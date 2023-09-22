<?php

namespace App\Message;

use App\Entity\User;

final class SendWelcomeEmail
{
    public function __construct(public readonly User $user)
    {
    }
}
