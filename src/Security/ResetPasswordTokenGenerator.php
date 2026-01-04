<?php
declare(strict_types=1);

namespace App\Security;

use App\Entity\User;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

readonly class ResetPasswordTokenGenerator
{
    public function __construct(
        #[Autowire(env: 'APP_SECRET')]
        private string $appSecret
    ){
    }

    public function generate(\DateTimeImmutable $expirationDate, User $user): string
    {
        $data = json_encode([$expirationDate, $user->id, $user->email]);

        return base64_encode(hash_hmac('sha256', $data, $this->appSecret, true));
    }
}
