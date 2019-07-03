<?php
namespace Wambo\Demo\Demo\Repository;

use Wambo\Demo\Demo\Domain\Language;
use Wambo\Demo\Demo\Domain\Message;

class MessageProvider
{
    /**
     * @throws \Exception
     */
    public function getDemoMessage() : Message
    {
        $demoMessage = 'Hello World';
        $language = new Language(Language::EN);

        $message = new Message($demoMessage, $language);
        return $message;
    }
}
