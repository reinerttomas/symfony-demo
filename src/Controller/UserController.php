<?php
declare(strict_types=1);

namespace App\Controller;

use App\Exception\NotFoundException;
use App\Message\SendWelcomeEmail;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    public function __construct(
        private readonly UserRepository $userRepository,
        private readonly MessageBusInterface $messageBus,
    ) {
    }

    #[Route('/users', name: 'user_list')]
    public function index(): Response
    {
        $users = $this->userRepository->findAll();

        return $this->render('user/index.html.twig', [
            'users' => $users
        ]);
    }

    #[Route('/users/send-welcome-email/{id}', name: 'user_send_welcome_email')]
    public function sendWelcomeEmail(int $id): Response
    {
        try {
            $user = $this->userRepository->get($id);
        } catch (NotFoundException $e) {
            throw $this->createNotFoundException($e->getMessage(), $e);
        }

        $this->messageBus->dispatch(new SendWelcomeEmail($user));
        $this->addFlash('success', sprintf('Welcome email was sent to "%s"', $user->getEmail()));

        return $this->redirectToRoute('user_list');
    }
}
