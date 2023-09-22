<?php

namespace App\MessageHandler;

use App\Action\SendWelcomeEmailAction;
use App\Exception\NotFoundException;
use App\Message\SendWelcomeEmail;
use App\Repository\UserRepository;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final class SendWelcomeEmailHandler
{
    public function __construct(
        private readonly UserRepository $userRepository,
        private readonly SendWelcomeEmailAction $sendWelcomeEmailAction,
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws TransportExceptionInterface
     */
    public function __invoke(SendWelcomeEmail $message): void
    {
        $user = $this->userRepository->get($message->userId);

        // add some delay
        sleep(3);

        $this->sendWelcomeEmailAction->execute($user);
    }
}
