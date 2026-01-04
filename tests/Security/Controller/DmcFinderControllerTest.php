<?php

declare(strict_types=1);

namespace App\Tests\Controller;

use App\Twig\Components\DmcFinder\RgbFinder;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\MockFileSessionStorage;
use Symfony\UX\LiveComponent\Test\InteractsWithLiveComponents;

class DmcFinderControllerTest extends WebTestCase
{
    use InteractsWithLiveComponents;

    public function testPageWithFormAppear()
    {
        $client = static::createClient();
        $client->request('GET', '/dmc-finder');
        self::assertResponseIsSuccessful();

        self::assertSelectorExists('[data-live-name-value=DmcFinder\:RgbFinder]');
        self::assertSelectorExists('[name=rgb_form]');
    }

    public function testRgbFinderWorks()
    {
        $client = static::createClient();
        $session = new Session(new MockFileSessionStorage());
        $session->start();

        $request = new Request();
        $request->setSession($session);

        $container = self::getContainer();
        $container->get(RequestStack::class)->push($request);

        $rgbFinderComponent = $this
            ->createLiveComponent(
                RgbFinder::class,
                client: $client
            );

        $rgbFinderComponent->submitForm(['rgb_form' => ['hexaText' => '#151521']], 'submit');

        self::assertSelectorTextSame('#search-recap', 'RGB recherché : RGB(21, 21, 33) (#151521)');
        self::assertSelectorExists('#search-result');
    }
}
