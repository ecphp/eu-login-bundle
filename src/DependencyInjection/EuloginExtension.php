<?php

declare(strict_types=1);

namespace drupol\ecas\DependencyInjection;

use drupol\ecas\Ecas;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * Class EuloginExtension.
 */
class EuloginExtension extends Extension
{
    /**
     * @param array<string> $configs
     * @param ContainerBuilder $container
     */
    public function load(array $configs, ContainerBuilder $container): void
    {
        $casDefinition = $container->getDefinition('cas');
        $casDefinition->setClass(Ecas::class);
    }
}
