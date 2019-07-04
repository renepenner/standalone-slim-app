<?php
namespace Wambo\Tests\Unit\Core\Presenter;

use PHPUnit\Framework\TestCase;
use Slim\Http\Response;
use Wambo\Demo\Core\Presenter\JsonPresenter;

class JsonPresenterTest extends TestCase
{
    public function testValidJsonResponse()
    {
        $viewModel = $this->createMock(\JsonSerializable::class);
        $viewModel->method('jsonSerialize')->willReturn([
            'message' => 'Hallo Test!',
        ]);

        $response = new Response();
        $jsonPresenter = new JsonPresenter();

        $newResponse = $jsonPresenter->__invoke($response, $viewModel);

        $this->assertEquals('{"message":"Hallo Test!"}', $newResponse->getBody());
    }

}
