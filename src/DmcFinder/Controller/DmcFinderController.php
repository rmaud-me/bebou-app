<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/dmc-finder', name: 'dmc_finder_')]
class DmcFinderController extends AbstractController
{
    #[Route('', name: 'main')]
    public function main(): Response
    {
        return $this->render('dmc-finder/main.html.twig');
    }
}
