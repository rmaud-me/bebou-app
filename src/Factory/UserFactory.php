<?php

declare(strict_types=1);

namespace App\Factory;

use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFactory
{
    public function __construct(
        private UserPasswordHasherInterface $userPasswordHasher,
    ) {
    }

    public function createGinUser(string $email, string $password): User
    {
        $user = new User();
        $user->email = $email;
        $user->roles = ['ROLE_GIN'];
        $user->setPassword($this->userPasswordHasher->hashPassword($user, $password));

        return $user;
    }
}
