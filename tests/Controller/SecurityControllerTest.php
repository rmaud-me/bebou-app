<?php

declare(strict_types=1);

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityControllerTest extends WebTestCase
{
    public function testLoginOk()
    {
        $client = static::createClient();
        $client->request('GET', '/login');
        self::assertResponseIsSuccessful();

        $client->submitForm('Connexion', [
            '_username' => 'user-gin@rmaud.me',
            '_password' => 'user-gin@rmaud.me',
        ]);

        self::assertResponseRedirects('/');
        $client->followRedirect();

        self::assertResponseIsSuccessful();
    }

    public function testLoginNok()
    {
        $client = static::createClient();
        $client->request('GET', '/login');
        self::assertResponseIsSuccessful();

        $client->submitForm('Connexion', [
            '_username' => 'user-gin@rmaud.me',
            '_password' => 'bad-password',
        ]);

        self::assertResponseRedirects('/login');
        $client->followRedirect();

        self::assertSelectorTextContains('.alert-danger', 'Identifiants invalides.');
    }

    public function testLoginNokEmailNotExist(): void
    {
        $client = static::createClient();
        $client->request('GET', '/login');
        self::assertResponseIsSuccessful();

        $client->submitForm('Connexion', [
            '_username' => 'doesNotExist@example.com',
            '_password' => 'password',
        ]);

        self::assertResponseRedirects('/login');
        $client->followRedirect();

        self::assertSelectorTextContains('.alert-danger', 'Identifiants invalides.');
    }
}
