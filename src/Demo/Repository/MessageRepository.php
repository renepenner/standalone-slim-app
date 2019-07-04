<?php
namespace Wambo\Demo\Demo\Repository;

use Wambo\Demo\Core\Service\JsonReader;
use Wambo\Demo\Demo\Domain\Language;
use Wambo\Demo\Demo\Domain\Message;

class MessageRepository
{
    private $jsonReader;

    public function __construct(JsonReader $jsonReader)
    {
        $this->jsonReader = $jsonReader;
    }
    
    /**
     * @throws \Exception
     */
    public function getDemoMessage() : Message
    {
        $rawMessageObject = $this->jsonReader->read('message.json');

        $demoMessage = $rawMessageObject['message'];
        $language = new Language($rawMessageObject['language']);

        $message = new Message($demoMessage, $language);
        return $message;
    }
}
