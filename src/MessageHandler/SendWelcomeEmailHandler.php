<?php

namespace App\MessageHandler;

use App\Action\SendWelcomeEmailAction;
use App\Message\SendWelcomeEmail;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final class SendWelcomeEmailHandler
{
    public function __construct(
        private readonly SendWelcomeEmailAction $sendWelcomeEmailAction,
    ) {
    }

    /**
     * @throws TransportExceptionInterface
     */
    public function __invoke(SendWelcomeEmail $message): void
    {
        // add some delay
        sleep(3);

        $this->sendWelcomeEmailAction->execute($message->user);
    }
}
