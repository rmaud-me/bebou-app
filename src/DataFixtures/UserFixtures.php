<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    public const string USER_GIN_REFERENCE = 'user-gin';
    public const string USER_REFERENCE = 'user';

    public function __construct(
        private UserPasswordHasherInterface $passwordHasher,
    ) {
    }

    public function load(ObjectManager $manager): void
    {
        foreach (self::getUserData() as $userDatum) {
            $user = new User();
            $user->email = $userDatum['email'];
            $user->roles = $userDatum['roles'];
            $user->setPassword($this->passwordHasher->hashPassword($user, $userDatum['password']));

            $manager->persist($user);

            $this->addReference($userDatum['reference'], $user);
        }

        $manager->flush();
    }

    /**
     * @return mixed[]
     */
    private static function getUserData(): array
    {
        return [
            [
                'email' => 'user-gin@rmaud.me',
                'password' => 'user-gin@rmaud.me',
                'roles' => ['ROLE_GIN'],
                'reference' => self::USER_GIN_REFERENCE,
            ],
            [
                'email' => 'user@rmaud.me',
                'password' => 'user@rmaud.me',
                'roles' => ['ROLE_USER'],
                'reference' => self::USER_REFERENCE,
            ],
        ];
    }
}
