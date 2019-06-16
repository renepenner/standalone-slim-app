<?php
namespace Wambo\Demo\Demo\Repository;

use Wambo\Demo\Demo\Domain\Language;
use Wambo\Demo\Demo\Domain\Message;
use Wambo\Demo\Demo\Presenter\Factory\MessageFactory;
use Wambo\Demo\Demo\Presenter\ViewModel\MessageModel;

class MessageProvider
{
    private $messageFactory;

    public function __construct(MessageFactory $messageFactory)
    {
        $this->messageFactory = $messageFactory;
    }

    /**
     * @throws \Exception
     */
    public function getDemoMessage() : MessageModel
    {
        $demoMessage = 'Hello World';
        $language = new Language(Language::EN);

        $message = new Message($demoMessage, $language);

        $messageModel = $this->messageFactory->getMessageModel($message);
        return $messageModel;
    }
}
