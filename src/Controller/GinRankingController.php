<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/gin-ranking', name: 'gin_ranking_')]
class GinRankingController extends AbstractController
{
    #[Route('', name: 'main')]
    public function main(): Response
    {
        return $this->render('gin-ranking/main.html.twig');
    }
}
