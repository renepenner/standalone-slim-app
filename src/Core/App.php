<?php
namespace Wambo\Demo\Core;

use DI\ContainerBuilder;

class App extends \DI\Bridge\Slim\App
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function configureContainer(ContainerBuilder $builder)
    {
        $builder->addDefinitions(API_ROOT_DIR . '/src/config.php');
    }

    public function registerPackage(RegistrationInterface $package)
    {
        $package->init($this);
    }
}