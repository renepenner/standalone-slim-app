<?php
namespace Wambo\Demo\Demo\Domain;

use Exception;

class Message
{
    private $message;
    private $language;

    /**
     * @throws Exception
     */
    public function __construct(string $message, Language $language)
    {
        if (empty($message)) {
            throw new Exception('message can not be empty');
        }

        $this->message = $message;
        $this->language = $language;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getLanguage(): Language
    {
        return $this->language;
    }
}
