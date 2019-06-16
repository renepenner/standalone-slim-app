<?php
namespace Wambo\Demo\Demo;

use Wambo\Demo\Core\App;
use Wambo\Demo\Core\RegistrationInterface;
use Wambo\Demo\Demo\Action\HelloWorld;

class Registration implements RegistrationInterface
{

    public function init(App $app)
    {
        $app->get('/', HelloWorld::class)->setName(HelloWorld::class);
    }
}
