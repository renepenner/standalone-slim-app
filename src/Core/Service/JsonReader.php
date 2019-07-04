<?php
namespace Wambo\Demo\Core\Service;

use League\Flysystem\FileNotFoundException;
use League\Flysystem\Filesystem;

class JsonReader
{
    private $filesystem;

    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    /**
     * @throws FileNotFoundException
     */
    public function read(string $filename): array
    {
        $fileContent = $this->filesystem->read($filename);
        $data = json_decode($fileContent, true, 512, JSON_THROW_ON_ERROR);

        return $data;
    }
}
