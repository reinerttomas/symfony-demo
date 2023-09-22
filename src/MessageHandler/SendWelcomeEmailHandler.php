<?php

namespace App\MessageHandler;

use App\Message\SendWelcomeEmail;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final class SendWelcomeEmailHandler
{
    public function __invoke(SendWelcomeEmail $message): void
    {
        sleep(3);
    }
}
