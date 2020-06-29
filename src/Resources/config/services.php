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
            service('ecas.configuration.inner'),
            service('request_stack'),
        ]);

    $container
        ->services()
        ->set('ecas', Ecas::class)
        ->decorate('cas')
        ->args([
            service('ecas.inner'),
            service('nyholm.psr7.psr17_factory'),
        ]);
};
