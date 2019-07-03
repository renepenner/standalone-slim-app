<?php
namespace Wambo\Demo\Core\Presenter;

use JsonSerializable;
use Slim\Http\Response;

class JsonPresenter
{
    public function __invoke(Response $response, JsonSerializable $viewModel): Response
    {
        $statusCode = $response->getStatusCode();
        return $response->withJson($viewModel, $statusCode);
    }
}
