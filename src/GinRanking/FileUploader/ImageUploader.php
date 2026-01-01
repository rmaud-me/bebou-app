<?php

declare(strict_types=1);

namespace App\GinRanking\FileUploader;

use App\GinRanking\ImageOptimizer;
use League\Flysystem\FilesystemOperator;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;

final readonly class ImageUploader
{
    public function __construct(private SluggerInterface $slugger, private ImageOptimizer $imageOptimizer)
    {
    }

    public function upload(FilesystemOperator $operator, File $file): string
    {
        $filename = \uniqid($file instanceof UploadedFile ? $file->getClientOriginalName() : $file->getFilename());
        $sluggedFilenameWithoutExtension = \uniqid($this->slugger->slug(\pathinfo($filename, \PATHINFO_FILENAME)) . '-');
        $sluggedOriginalFilename = $sluggedFilenameWithoutExtension . '.' . $file->guessExtension();

        $file = $file->move($file->getPath(), $sluggedOriginalFilename);
        $this->imageOptimizer->resize($file->getPathname());
        $operator->write($sluggedOriginalFilename, $file->getContent());

        return $sluggedOriginalFilename;
    }
}
