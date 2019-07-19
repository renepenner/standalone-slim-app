<?php
namespace Wambo\Demo\Api;

use DI\Container;
use Invoker\Invoker;
use Invoker\ParameterResolver\AssociativeArrayResolver;
use Invoker\ParameterResolver\Container\TypeHintContainerResolver;
use Invoker\ParameterResolver\DefaultValueResolver;
use Invoker\ParameterResolver\ResolverChain;
use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;
use Psr\Container\ContainerInterface;
use Wambo\Demo\Core\Resolver\TypedParameterResolver;
use Wambo\Demo\Demo\Domain\Language;

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

    'foundHandler.invoker' => function (ContainerInterface $container) {
        $resolvers = [
            new TypedParameterResolver($container),
            // Inject parameters by name first
            new AssociativeArrayResolver,
            // Then inject services by type-hints for those that weren't resolved
            new TypeHintContainerResolver($container),
            // Then fall back on parameters default values for optional route parameters
            new DefaultValueResolver(),
        ];
        return new Invoker(new ResolverChain($resolvers), $container);
    },

    Filesystem::class => function (Container $container) {
        $adapter = new Local(API_ROOT_DIR.'/data');
        $filesystem = new Filesystem($adapter);

        return $filesystem;
    },

    'typedParameters' => [
        'language' => Language::class
    ]
];
