<?php

declare(strict_types=1);

namespace App\Controller;

use App\Form\Security\ForgotPasswordForm;
use App\Repository\UserRepository;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Contracts\Translation\TranslatorInterface;

class SecurityController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();

        return $this->render('security/login.html.twig', [
            'lastUsername' => $authenticationUtils->getLastUsername(),
            'error' => $error,
        ]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    #[Route(path: '/forgot-password', name: 'app_forgot_password')]
    public function forgotPassword(Request $request, UserRepository $userRepository, TranslatorInterface $translator): Response
    {
        $form = $this->createForm(ForgotPasswordForm::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $email = $form->getData()['email'];
            $user = $userRepository->findOneBy(['email' => $email]);

            $this->addFlash('notice', $translator->trans('security.forgot_password.flashes.notice.forgot_password_request_handle'));

            if ($user) {
                // TODO: send email Cf: https://github.com/rmaud-me/bebou-app/issues/24
            }

            return $this->redirectToRoute('app_login');
        }

        return $this->render('security/forgot-password.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
