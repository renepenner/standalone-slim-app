<?php
namespace Wambo\Demo\Core\Action;

use Exception;
use JsonSerializable;
use Wambo\Demo\Core\Presenter\ViewModel\ErrorViewModel;

abstract class CoreAction
{
    protected function createErrorViewModel(Exception $exception): JsonSerializable
    {
        return new ErrorViewModel($exception);
    }
}
