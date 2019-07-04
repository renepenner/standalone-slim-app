<?php
namespace Wambo\Demo\Api;

use DI\Container;
use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;

return [
    'settings.responseChunkSize' => 4096,
    'settings.outputBuffering' => 'append',
    'settings.determineRouteBeforeAppMiddleware' => false,
    'settings.displayErrorDetails' => true,
    'settings.debug' => true,

    Filesystem::class => function (Container $container) {
        $adapter = new Local(API_ROOT_DIR.'/data');
        $filesystem = new Filesystem($adapter);

        return $filesystem;
    }
];
