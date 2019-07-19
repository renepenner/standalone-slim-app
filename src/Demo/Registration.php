<?php
namespace Wambo\Demo\Demo;

use Wambo\Demo\Core\App;
use Wambo\Demo\Core\RegistrationInterface;
use Wambo\Demo\Demo\Action\HelloWorld;
use Wambo\Demo\Demo\Action\HelloWorldByLanguage;

class Registration implements RegistrationInterface
{

    public function init(App $app)
    {
        $app->get('/', HelloWorld::class)
            ->setName(HelloWorld::class);

        $app->get('/byLanguage/{language:.+}', HelloWorldByLanguage::class)
            ->setName(HelloWorldByLanguage::class);
    }
}
