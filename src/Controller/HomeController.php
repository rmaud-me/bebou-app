<?php

declare(strict_types=1);

namespace App\Controller;

use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home(): Response
    {
        return $this->render('home.html.twig');
    }

    #[Route('/paginator', name: 'app_paginator')]
    public function paginator(PaginatorInterface $paginator, Request $request): Response
    {
        $pagination = $paginator->paginate(
            [
                [
                    'value' => '2/1',
                    'name' => '2/1 - Competition',
                ],
                [
                    'value' => 'SAYCBASIC',
                    'name' => 'SAYC - Basic',
                ],
                [
                    'value' => 'SAYCPLUS',
                    'name' => 'SAYC - Plus',
                ],
                [
                    'value' => 'SEF',
                    'name' => 'SEF - Competition',
                ],
                [
                    'value' => 'ACOL',
                    'name' => 'ACOL - Competition',
                ],
            ],
            $request->query->getInt('page', 1),
            2
        );

        return $this->render('pagination.html.twig', ['pagination' => $pagination]);
    }
}
