<?php declare(strict_types = 1);
namespace Wambo\Tests\Unit\Demo\Domain;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use TypeError;
use Wambo\Demo\Demo\Domain\Language;
use Wambo\Demo\Demo\Domain\Message;

class MessageTest extends TestCase
{
    public function testValidMessage()
    {
        $validMessage = 'Hello TestCase!';
        $language = $this->createMock(Language::class);

        $message = new Message($validMessage, $language);

        $this->assertEquals($validMessage, $message->getMessage());
    }

    /**
     * @param $invalidMessage
     * @throws InvalidArgumentException
     * @dataProvider invalidMessageProvider
     */
    public function testInvalidMessage($invalidMessage, $errorClass)
    {
        $this->expectException($errorClass);

        $language = $this->createMock(Language::class);
        new Message($invalidMessage, $language);
    }

    public function invalidMessageProvider()
    {
        return [
            ['', InvalidArgumentException::class],
            [null, TypeError::class],
            [123, TypeError::class],
            [array(), TypeError::class],
            [1.23, TypeError::class],
            [true, TypeError::class],
        ];
    }
}