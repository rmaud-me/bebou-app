<?php
declare(strict_types=1);

namespace App\Security;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\Mailer\Exception\TransportException;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Contracts\Translation\TranslatorInterface;

readonly class ResetPasswordEmailSender
{
    public function __construct(
        #[Autowire(env: 'MAILER_NO_REPLY_SENDER')]
        private string $senderEmail,
        private TranslatorInterface $translator,
        private MailerInterface $mailer
    ){
    }

    public function send(string $email)
    {
        $email = new TemplatedEmail()
            ->from($this->senderEmail)
            ->to(new Address($email))
            ->subject($this->translator->trans('security.reset_password.email.subject'))
            ->htmlTemplate('security/emails/reset-password.html.twig')
            ->locale('fr')
        ;

        try {
            $this->mailer->send($email);
        } catch (TransportExceptionInterface $exception) {}
    }
}
