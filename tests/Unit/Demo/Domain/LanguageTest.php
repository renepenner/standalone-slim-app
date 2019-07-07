<?php declare(strict_types = 1);
namespace Wambo\Tests\Unit\Demo\Domain;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use TypeError;
use Wambo\Demo\Demo\Domain\Language;
use Wambo\Demo\Demo\Domain\Message;

class LanguageTest extends TestCase
{
    public function testValidLanguageString()
    {
        $languageParameter = 'de';
        $language = new Language($languageParameter);

        $this->assertEquals($language->getValue(), $languageParameter);
    }

    /**
     * @param $invalidLanguage
     * @param $errorClass
     * @throws InvalidArgumentException
     * @dataProvider invalidMessageProvider
     */
    public function testInvalidLanguage($invalidLanguage, $errorClass)
    {
        $this->expectException($errorClass);
        new Language($invalidLanguage);
    }

    public function invalidMessageProvider()
    {
        return [
            ['', InvalidArgumentException::class],
            ['DEU', InvalidArgumentException::class],
            ['XX', InvalidArgumentException::class],
            [null, TypeError::class],
            [123, TypeError::class],
            [array(), TypeError::class],
            [1.23, TypeError::class],
            [true, TypeError::class],
        ];
    }
}