<?php
namespace Wambo\Demo\Demo\Domain;

use InvalidArgumentException;
use TypeError;

class Message
{
    private $message;
    private $language;

    /**
     * @throws InvalidArgumentException
     */
    public function __construct(string $message, Language $language)
    {
        if (empty($message)) {
            throw new InvalidArgumentException('Message can not be empty');
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
