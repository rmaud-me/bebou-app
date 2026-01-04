<?php

declare(strict_types=1);

namespace App\Entity\Security;

use App\Repository\Security\ResetPasswordRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResetPasswordRepository::class)]
#[ORM\UniqueConstraint(fields: ['token'])]
#[ORM\Table(name: 'reset_password')]
class ResetPassword
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    public ?int $id;

    #[ORM\Column]
    public string $token;

    #[ORM\Column]
    public string $email;

    #[ORM\Column(type: Types::DATETIMETZ_IMMUTABLE)]
    public \DateTimeImmutable $expiratedAt;

    #[ORM\Column(type: Types::DATETIMETZ_IMMUTABLE)]
    public \DateTimeImmutable $requestedAt;
}
