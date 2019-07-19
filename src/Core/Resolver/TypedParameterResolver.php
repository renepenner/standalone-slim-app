<?php
namespace Wambo\Demo\Core\Resolver;

use Invoker\ParameterResolver\ParameterResolver;
use Psr\Container\ContainerInterface;
use ReflectionFunctionAbstract;
use Wambo\Api\Shop\Domain\Product\Sku;

class TypedParameterResolver implements ParameterResolver
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function getParameters(
        ReflectionFunctionAbstract $reflection,
        array $providedParameters,
        array $resolvedParameters
    ) {
        $parameters = $reflection->getParameters();

        // Skip parameters already resolved
        if (! empty($resolvedParameters)) {
            $parameters = array_diff_key($parameters, $resolvedParameters);
        }

        $typedParameters = $this->container->get('typedParameters');
        foreach ($parameters as $index => $parameter) {
            if (array_key_exists($parameter->name, $typedParameters)) {
                $parameter = new $typedParameters[$parameter->name]($providedParameters[$parameter->name]);
                $resolvedParameters[$index] = $parameter;
            }
        }

        return $resolvedParameters;
    }
}
