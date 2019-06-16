<?php
namespace Wambo\Demo\Demo\Action;

use Exception;
use Psr\Http\Message\ResponseInterface;
use Slim\Http\Response;
use Wambo\Demo\Demo\Presenter\TextMessagePresenter;
use Wambo\Demo\Demo\Repository\MessageProvider;

class HelloWorld
{
    private $messageRepository;
    private $textMessagePresenter;

    public function __construct(MessageProvider $messageRepository, TextMessagePresenter $textMessagePresenter)
    {
        $this->messageRepository = $messageRepository;
        $this->textMessagePresenter = $textMessagePresenter;
    }

    public function __invoke(Response $response) : ResponseInterface
    {
        try {
            $message = $this->messageRepository->getDemoMessage();
            return $this->textMessagePresenter->__invoke($response, $message);
        } catch (Exception $exception) {
            // ToDo: Build an error presenter
            return $response
                ->withStatus(500)
                ->write($exception->getMessage());
        }
    }
}
