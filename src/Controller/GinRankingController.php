<?php

declare(strict_types=1);

namespace App\Controller;

use App\Dto\RemoveFileDto;
use App\Entity\GinRanking\Gin;
use App\Event\RemoveFileOnTerminateListener;
use App\Form\GinRanking\GinType;
use App\GinRanking\Dto\GinUpsertDto;
use App\Repository\GinRanking\GinRepository;
use Doctrine\ORM\EntityManagerInterface;
use League\Flysystem\FilesystemOperator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\ObjectMapper\ObjectMapperInterface;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/gin-ranking', name: 'gin_ranking_')]
class GinRankingController extends AbstractController
{
    #[Route('/', name: 'main')]
    public function main(GinRepository $ginRepository): Response
    {
        return $this->render('gin-ranking/main.html.twig', [
            'gins' => $ginRepository->findBy([], ['category' => 'DESC']),
        ]);
    }

    #[Route('/new', name: 'new')]
    public function new(Request $request, EntityManagerInterface $entityManager, ObjectMapperInterface $objectMapper): Response
    {
        $form = $this->createForm(GinType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ginUpsertDto = $form->getData();
            $gin = $objectMapper->map($ginUpsertDto, Gin::class);

            $entityManager->persist($gin);
            $entityManager->flush();

            return $this->redirectToRoute('gin_ranking_main');
        }

        return $this->render('gin-ranking/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}/edit', name: 'edit')]
    public function edit(Request $request, Gin $gin, EntityManagerInterface $entityManager, ObjectMapperInterface $objectMapper,
        GinRepository $ginRepository, RemoveFileOnTerminateListener $removeFileOnTerminateListener, FilesystemOperator $ginImageStorage): Response
    {
        $oldPath = $gin->imagePath;
        $form = $this->createForm(GinType::class, $objectMapper->map($gin, GinUpsertDto::class));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ginUpsertDto = $form->getData();
            $objectMapper->map($ginUpsertDto, $gin);

            $entityManager->flush();

            if ($oldPath !== $gin->imagePath && !$ginRepository->isUsed($oldPath)) {
                $removeFileOnTerminateListener->addPathToRemove(new RemoveFileDto($ginImageStorage, $oldPath));
            }

            return $this->redirectToRoute('gin_ranking_main');
        }

        return $this->render('gin-ranking/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}/remove', name: 'remove')]
    public function remove(Gin $gin, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($gin);
        $entityManager->flush();

        return $this->redirectToRoute('gin_ranking_main');
    }
}
