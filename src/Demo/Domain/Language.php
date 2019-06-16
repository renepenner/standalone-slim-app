<?php
namespace Wambo\Demo\Demo\Domain;

use Exception;

class Language
{
    const EN = 'en';
    const DE = 'de';

    const AVAILABLE_LANGUAGES = [self::EN, self::DE];

    private $language;

    /**
     * @throws Exception
     */
    public function __construct(string $language)
    {
        if (!in_array($language, self::AVAILABLE_LANGUAGES)) {
            throw new Exception('Language not supported!');
        }

        $this->language = $language;
    }

    public function getValue() : string
    {
        return $this->language;
    }
}
