<?php

declare(strict_types=1);

namespace App\Command;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Validator\ValidatorInterface;

#[AsCommand(name: 'bebou:user:create', description: 'Allow to create authenticated user.')]
class CreateUserCommand extends Command
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private UserPasswordHasherInterface $userPasswordHasher,
        private ValidatorInterface $validator
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('email', InputArgument::REQUIRED, 'User email')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $email = $input->getArgument('email');
        $user = $this->entityManager->getRepository(User::class)->findOneBy(['email' => $email]);

        if ($user) {
            $io->error('User already exists.');

            return Command::FAILURE;
        }

        $errors = $this->validator->validate($email, [new Email()]);
        if (\count($errors) > 0) {
            foreach ($errors as $error) {
                /** @var string $errorMessage */
                $errorMessage = $error->getMessage();
                $io->error($errorMessage);
            }

            return Command::FAILURE;
        }

        $passwordQuestion = new Question('What is the password used by the user to connect?');
        $passwordQuestion->setHidden(true);
        $passwordQuestion->setHiddenFallback(false);

        $password = $io->askQuestion($passwordQuestion);

        $repeatPasswordQuestion = new Question('Repeat previous password');
        $repeatPasswordQuestion->setHidden(true);
        $repeatPasswordQuestion->setHiddenFallback(false);

        $repeatPassword = $io->askQuestion($repeatPasswordQuestion);

        if ($repeatPassword !== $password) {
            $io->error('Passwords entered are not equal.');

            return Command::FAILURE;
        }

        $user = new User();
        $user->email = $email;
        $user->roles = ['ROLE_GIN'];
        $user->setPassword($this->userPasswordHasher->hashPassword($user, $password));

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        $io->success('User created.');

        return Command::SUCCESS;
    }
}
