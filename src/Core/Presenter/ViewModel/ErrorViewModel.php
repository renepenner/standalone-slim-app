<?php
namespace Wambo\Demo\Core\Presenter\ViewModel;

use Exception;
use JsonSerializable;

/**
 * @OA\Schema()
 */
class ErrorViewModel implements JsonSerializable
{
    /**
     * The Message
     * @var string
     * @OA\Property(
     *     required={"message"}
     * )
     */
    private $message;

    public function __construct(Exception $exception)
    {
        $this->message = $exception->getTraceAsString() . $exception->getMessage();
    }

    public function jsonSerialize()
    {
        return [
            'message' => $this->message
        ];
    }
}
