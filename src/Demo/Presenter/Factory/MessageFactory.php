<?php
namespace Wambo\Demo\Demo\Presenter\Factory;

use Wambo\Demo\Demo\Domain\Message;
use Wambo\Demo\Demo\Presenter\ViewModel\MessageModel;

class MessageFactory
{
    public function getMessageModel(Message $message) : MessageModel
    {
        return new MessageModel($message->getMessage());
    }
}
