<?php
namespace Wambo\Demo\Demo\Presenter\ViewModel;

use JsonSerializable;

class MessageViewModel implements JsonSerializable
{
    private $message;

    public function __construct(string $message)
    {
        $this->message = $message;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function jsonSerialize()
    {
        return [
            'message' => $this->getMessage()
        ];
    }
}
