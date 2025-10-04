<?php

declare(strict_types=1);

namespace App\Tests\Command;

use App\Repository\UserRepository;
use Psr\Container\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Tester\CommandTester;

class CreateUserCommandTest extends KernelTestCase
{
    private ContainerInterface $container;
    private CommandTester $commandTester;

    protected function setUp(): void
    {
        self::bootKernel();

        $this->container = static::getContainer();

        $application = new Application(self::$kernel);
        $command = $application->find('bebou:user:create');
        $this->commandTester = new CommandTester($command);
    }

    public function testExecuteWithNewUserSuccess(): void
    {
        $email = 'test@example.com';
        $password = 'password123';

        $this->commandTester->setInputs([$password, $password]);

        $exitCode = $this->commandTester->execute([
            'email' => $email,
        ]);

        self::assertEquals(Command::SUCCESS, $exitCode);
        self::assertStringContainsString('User created.', $this->commandTester->getDisplay());

        /** @var UserRepository $userRepository */
        $userRepository = $this->container->get(UserRepository::class);
        $createdUser = $userRepository->findOneBy(['email' => $email]);

        self::assertNotNull($createdUser);
        self::assertEquals($email, $createdUser->email);
        self::assertContains('ROLE_GIN', $createdUser->getRoles());
        self::assertNotEmpty($createdUser->getPassword());
    }

    public function testExecuteWithExistingUserFailure(): void
    {
        /** @var UserRepository $userRepository */
        $userRepository = $this->container->get(UserRepository::class);
        $existingUser = $userRepository->findOneBy(['email' => 'user-gin@rmaud.me']);

        $exitCode = $this->commandTester->execute([
            'email' => $existingUser->email,
        ]);

        self::assertEquals(Command::FAILURE, $exitCode);
        self::assertStringContainsString('User already exists.', $this->commandTester->getDisplay());
    }

    public function testExecuteWithPasswordMismatchFailure(): void
    {
        $email = 'test@example.com';
        $password = 'password123';
        $differentPassword = 'different_password';

        $this->commandTester->setInputs([$password, $differentPassword]);

        $exitCode = $this->commandTester->execute([
            'email' => $email,
        ]);

        self::assertEquals(Command::FAILURE, $exitCode);
        self::assertStringContainsString('Passwords entered are not equal.', $this->commandTester->getDisplay());

        /** @var UserRepository $userRepository */
        $userRepository = $this->container->get(UserRepository::class);

        $user = $userRepository->findOneBy(['email' => $email]);
        self::assertNull($user);
    }

    public function testCommandConfiguration(): void
    {
        $application = new Application(self::$kernel);
        $command = $application->find('bebou:user:create');

        self::assertEquals('bebou:user:create', $command->getName());
        self::assertEquals('Allow to create authenticated user.', $command->getDescription());

        $emailArgument = $command->getDefinition()->getArgument('email');
        self::assertTrue($emailArgument->isRequired());
        self::assertEquals('User email', $emailArgument->getDescription());
    }
}
