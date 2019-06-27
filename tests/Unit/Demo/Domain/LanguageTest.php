<?php
namespace Wambo\Tests\Unit\Demo\Domain;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Wambo\Demo\Demo\Domain\Language;

class LanguageTest extends TestCase
{
    public function testInvalidLanguageString()
    {
        $this->expectException(InvalidArgumentException::class);

        $languageParameter = 'invalid';
        new Language($languageParameter);
    }
}