<?php
namespace Wambo\Demo\Demo\Presenter\ViewModel;

use JsonSerializable;

/**
 * @OA\Schema()
 */
class MessageViewModel implements JsonSerializable
{
    /**
     * The Message
     * @var string
     * @OA\Property(
     *     required={"message"}
     * )
     */
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
