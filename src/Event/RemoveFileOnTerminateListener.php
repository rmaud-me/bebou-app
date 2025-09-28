<?php

declare(strict_types=1);

namespace App\Event;

use App\Dto\RemoveFileDto;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpKernel\KernelEvents;

#[AsEventListener(KernelEvents::TERMINATE)]
final class RemoveFileOnTerminateListener
{
    /** @var array<string, RemoveFileDto> */
    private array $pathsToRemove = [];

    public function __invoke(): void
    {
        foreach ($this->pathsToRemove as $pathDto) {
            $pathDto->filesystemOperator->delete($pathDto->path);
        }
    }

    public function addPathToRemove(RemoveFileDto $removeFileDto): void
    {
        $this->pathsToRemove[\spl_object_id($removeFileDto->filesystemOperator) . \DIRECTORY_SEPARATOR . $removeFileDto->path] = $removeFileDto;
    }
}
