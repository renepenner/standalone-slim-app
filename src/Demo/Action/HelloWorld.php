<?php
namespace Wambo\Demo\Demo\Action;

use Exception;
use Psr\Http\Message\ResponseInterface;
use Slim\Http\Response;
use Wambo\Demo\Core\Presenter\JsonPresenter;
use Wambo\Demo\Demo\Presenter\Factory\MessageFactory;
use Wambo\Demo\Demo\Repository\MessageRepository;

class HelloWorld
{
    private $messageRepository;
    private $messageFactory;
    private $presenter;

    public function __construct(
        MessageRepository $messageRepository,
        MessageFactory $messageFactory,
        JsonPresenter $presenter
    ) {
        $this->messageRepository = $messageRepository;
        $this->presenter = $presenter;
        $this->messageFactory = $messageFactory;
    }

    /**
     * @OA\Get(
     *     path="/",
     *     @OA\Response(
     *      response="200",
     *      description="Hello World Message",
     *      @OA\JsonContent(ref="#/components/schemas/MessageViewModel"),
     *   )
     * )
     */
    public function __invoke(Response $response) : ResponseInterface
    {
        try {
            $message = $this->messageRepository->getDemoMessage();
            $messageViewModel = $this->messageFactory->getMessageModel($message);
            return $this->presenter->__invoke($response, $messageViewModel);
        } catch (Exception $exception) {
            // ToDo: Build an error presenter
            return $response
                ->withStatus(500)
                ->write($exception->getMessage());
        }
    }
}
