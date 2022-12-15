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

return static function (ContainerConfigurator $container): void {
    $services = $container->services();

    $services
        ->defaults()
        ->autoconfigure(true)
        ->autowire(true);

    $services
        ->set('ecas.introspector', EcasIntrospector::class)
        ->decorate('cas.introspector')
        ->arg('$introspector', service('.inner'));

    $services
        ->set('eulogin.userprovider', EuLoginUserProvider::class)
        ->decorate('cas.userprovider')
        ->arg('$casUserProvider', service('.inner'));
    $services->alias(EuLoginUserProvider::class, 'eulogin.userprovider');

    $services
        ->set('ecas.configuration', EcasProperties::class)
        ->decorate('cas.configuration')
        ->arg('$casProperties', service('.inner'));

    $services
        ->set('ecas', Ecas::class)
        ->decorate('cas')
        ->arg('$cas', service('.inner'));
};
