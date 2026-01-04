<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\User;
use App\Factory\ResetPasswordFactory;
use App\Form\Security\ForgotPasswordForm;
use App\Repository\UserRepository;
use App\Security\ResetPasswordTokenGenerator;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Clock\Clock;
use Symfony\Component\Clock\ClockInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Contracts\Translation\TranslatorInterface;

use function Symfony\Component\Clock\now;

class SecurityController extends AbstractController
{
    public function __construct(
        private readonly ResetPasswordTokenGenerator $resetPasswordTokenGenerator,
        private readonly ClockInterface $clock,
        private readonly UserRepository $userRepository,
        private readonly EntityManagerInterface $entityManager,
        private readonly ResetPasswordFactory $resetPasswordFactory
    ){
    }

    #[Route(path: '/login', name: 'security_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();

        return $this->render('security/login.html.twig', [
            'lastUsername' => $authenticationUtils->getLastUsername(),
            'error' => $error,
        ]);
    }

    #[Route(path: '/logout', name: 'security_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    #[Route(path: '/forgot-password', name: 'security_forgot_password')]
    public function forgotPassword(Request $request, TranslatorInterface $translator): Response
    {
        $form = $this->createForm(ForgotPasswordForm::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $email = $form->getData()['email'];
            /** @var User $user */
            $user = $this->entityManager->getRepository(UserRepository::class)->findOneBy(['email' => $email]);

            $this->addFlash('notice', $translator->trans('security.forgot_password.flashes.notice.forgot_password_request_handle'));

            if ($user) {
                $expiratedAt = now('+24 hours');

                $token = $this->resetPasswordTokenGenerator->generate($expiratedAt, $user);

                $resetPassword = $this->resetPasswordFactory->create($expiratedAt, $token);
                $this->entityManager->persist($resetPassword);
                $this->entityManager->flush();


                // Send email with link to reset password
                // Create new route to reset password
                // Create form to reset password
                // Save new password
            }

            return $this->redirectToRoute('security_login');
        }

        return $this->render('security/forgot-password.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
