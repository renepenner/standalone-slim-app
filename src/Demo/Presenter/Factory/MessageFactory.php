<?php
namespace Wambo\Demo\Demo\Presenter\Factory;

use Wambo\Demo\Demo\Domain\Message;
use Wambo\Demo\Demo\Presenter\ViewModel\MessageViewModel;

class MessageFactory
{
    public function getMessageViewModel(Message $message) : MessageViewModel
    {
        return new MessageViewModel($message->getMessage());
    }
}
