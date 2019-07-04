<?php
namespace Wambo\Tests\Unit\Core\Service;

use League\Flysystem\Filesystem;
use PHPUnit\Framework\TestCase;
use Wambo\Demo\Core\Service\JsonReader;

class JsonReaderTest extends TestCase
{
    public function testReadValidJsonFile()
    {
        $testJson = <<<JSON
{
  "message": "Hello World!",
  "language": "en"
}
JSON;

        $filesystem = $this->createMock(Filesystem::class);
        $filesystem->method('read')->willReturn($testJson);
        $jsonReader = new JsonReader($filesystem);

        $result = $jsonReader->read('message.json');

        $this->assertEquals(['message'=>'Hello World!', 'language' => 'en'], $result);
    }
}