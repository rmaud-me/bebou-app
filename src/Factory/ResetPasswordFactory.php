<?php
declare(strict_types=1);

namespace App\Factory;

use App\Entity\Security\ResetPassword;
use Symfony\Component\Clock\ClockInterface;

readonly class ResetPasswordFactory
{
    public function __construct(
        private ClockInterface $clock
    ){
    }

    public function create(\DateTimeImmutable $expiratedAt, string $token): ResetPassword
    {
        $resetPassword = new ResetPassword();
        $resetPassword->expiratedAt = $expiratedAt;
        $resetPassword->token = $token;
        $resetPassword->requestedAt = $this->clock->now();

        return $resetPassword;
    }
}
