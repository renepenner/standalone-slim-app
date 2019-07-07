<?php
namespace Wambo\Demo\Demo\Action;

use Exception;
use Psr\Http\Message\ResponseInterface;
use Wambo\Demo\Core\Action\CoreAction;
use Wambo\Demo\Core\Presenter\JsonPresenter;
use Wambo\Demo\Demo\Presenter\Factory\MessageFactory;
use Wambo\Demo\Demo\Repository\MessageRepository;

class HelloWorld extends CoreAction
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
     *     summary="Returns a Demo Message",
     *     @OA\Response(
     *       response="200",
     *       description="Returns a MessageViewModel",
     *       @OA\JsonContent(ref="#/components/schemas/MessageViewModel"),
     *     ),
     *     @OA\Response(
     *       response="500",
     *       description="Returns a ErrorViewModel",
     *       @OA\JsonContent(ref="#/components/schemas/ErrorViewModel"),
     *     )
     * )
     */
    public function __invoke(ResponseInterface $response): ResponseInterface
    {
        try {
            $message = $this->messageRepository->getDemoMessage();
            $viewModel = $this->messageFactory->getMessageViewModel($message);
        } catch (Exception $exception) {
            $response = $response->withStatus(500);
            $viewModel = $this->createErrorViewModel($exception);
        }

        return $this->presenter->__invoke($response, $viewModel);
    }
}
