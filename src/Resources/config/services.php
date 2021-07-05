<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/ecphp
 */

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use EcPhp\Ecas\Ecas;
use EcPhp\Ecas\EcasProperties;
use EcPhp\Ecas\Introspection\EcasIntrospector;
use EcPhp\EuLoginBundle\Security\Core\User\EuLoginUserProvider;

return static function (ContainerConfigurator $container) {
    $container
        ->services()
        ->set('ecas.introspector', EcasIntrospector::class)
        ->decorate('cas.introspector')
        ->args([
            service('ecas.introspector.inner'),
        ]);

    $container
        ->services()
        ->set('eulogin.userprovider', EuLoginUserProvider::class)
        ->args([
            service('cas.userprovider'),
        ]);

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
