<?php
namespace Wambo\Demo\Demo\Action;

use Exception;
use Psr\Http\Message\ResponseInterface;
use Wambo\Demo\Core\Action\CoreAction;
use Wambo\Demo\Core\Presenter\JsonPresenter;
use Wambo\Demo\Demo\Domain\Language;
use Wambo\Demo\Demo\Presenter\ViewModel\MessageViewModel;

class HelloWorldByLanguage extends CoreAction
{
    protected $presenter;

    public function __construct(JsonPresenter $presenter)
    {
        $this->presenter = $presenter;
    }

    public function __invoke(ResponseInterface $response, Language $language): ResponseInterface
    {
        try {
            $viewModel = new MessageViewModel($language->getValue());
        } catch (Exception $exception) {
            $response = $response->withStatus(500);
            $viewModel = $this->createErrorViewModel($exception);
        }

        return $this->presenter->__invoke($response, $viewModel);
    }
}
