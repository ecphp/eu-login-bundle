<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use EcPhp\Ecas\Ecas;
use EcPhp\Ecas\EcasProperties;
use EcPhp\EuLoginBundle\Security\Core\User\EuLoginUserProvider;

return static function (ContainerConfigurator $container) {
    $container
        ->services()
        ->set('eulogin.userprovider', EuLoginUserProvider::class);

    $container
        ->services()
        ->set('ecas.configuration', EcasProperties::class)
        ->decorate('cas.configuration')
        ->args([
            ref('ecas.configuration.inner'),
            ref('request_stack'),
        ]);

    $container
        ->services()
        ->set('ecas', Ecas::class)
        ->decorate('cas')
        ->args([
            ref('cas.inner'),
            ref('nyholm.psr7.psr17_factory'),
        ]);
};
