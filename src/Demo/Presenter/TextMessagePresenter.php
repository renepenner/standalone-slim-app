<?php
namespace Wambo\Demo\Demo\Presenter;

use Psr\Http\Message\ResponseInterface;
use Slim\Http\Response;
use Wambo\Demo\Demo\Presenter\ViewModel\MessageModel;

class TextMessagePresenter
{
    public function __invoke(Response $response, MessageModel $messageViewModel) : ResponseInterface
    {
        $textMessage = $messageViewModel->getMessage();

        return $response->write($textMessage);
    }
}