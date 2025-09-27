<?php

declare(strict_types=1);

namespace App\GinRanking\FileUploader;

use App\GinRanking\ImageOptimizer;
use League\Flysystem\FilesystemOperator;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;

final readonly class FileUploader
{
    public function __construct(private SluggerInterface $slugger, private ImageOptimizer $imageOptimizer)
    {
    }

    public function upload(FilesystemOperator $operator, File $file): string
    {
        $filename = $file instanceof UploadedFile ? $file->getClientOriginalName() : $file->getFilename();
        $sluggedOriginalFilename = $this->slugger->slug(\pathinfo($filename, \PATHINFO_FILENAME)) . '.' . $file->guessExtension();

        $file = $file->move($file->getPath(), $sluggedOriginalFilename);
        $this->imageOptimizer->resize($file->getPathname());
        $operator->write($sluggedOriginalFilename, $file->getContent());

        return $sluggedOriginalFilename;
    }
}
