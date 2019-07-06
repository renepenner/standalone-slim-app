<?php
namespace Wambo\Demo\Core\Presenter;

use JsonSerializable;
use Psr\Http\Message\ResponseInterface;
use RuntimeException;
use Slim\Http\Stream;

class JsonPresenter
{
    /**
     * @param ResponseInterface $response
     * @param JsonSerializable $viewModel
     * @return ResponseInterface
     *
     * @throws RuntimeException, JsonException
     */
    public function __invoke(ResponseInterface $response, JsonSerializable $viewModel): ResponseInterface
    {
        $json = json_encode($viewModel, JSON_THROW_ON_ERROR);

        $body = new Stream(fopen('php://temp', 'r+'));
        $body->write($json);

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withBody($body);
    }
}
