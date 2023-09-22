<?php
declare(strict_types=1);

namespace App\Action;

use App\Entity\User;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;

class SendWelcomeEmailAction
{
    public function __construct(
        private readonly MailerInterface $mailer,
    ) {
    }

    /**
     * @throws TransportExceptionInterface
     */
    public function execute(User $user): void
    {
        $email = (new TemplatedEmail())
            ->to(new Address($user->getEmail(), $user->getFirstName()))
            ->subject('Welcome to Symfony Mailer!')
            ->htmlTemplate('email/welcome.html.twig')
            ->context([
                'user' => $user,
            ]);

        $this->mailer->send($email);
    }
}
