<?php
namespace Wambo\Demo\Api;

use DI\Container;
use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;

/**
 * @OA\Server(
 *     url="http://localhost:8000",
 *     description="Development Server"
 * )
 * @OA\Info(
 *     title="Slim API Skeleton",
 *     version="0.1"
 * )
 *
 */

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
