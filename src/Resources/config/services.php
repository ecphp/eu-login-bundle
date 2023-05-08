<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/ecphp
 */

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use EcPhp\CasBundle\Cas\SymfonyCasInterface;
use EcPhp\CasBundle\Security\Core\User\CasUserProviderInterface;
use EcPhp\CasLib\Contract\Configuration\PropertiesInterface;
use EcPhp\Ecas\EcasProperties;
use EcPhp\EuLoginBundle\Cas\SymfonyECas;
use EcPhp\EuLoginBundle\Security\Core\User\EuLoginUserProvider;

return static function (ContainerConfigurator $container): void {
    $services = $container->services();

    $services
        ->defaults()
        ->autoconfigure(true)
        ->autowire(true);

    $services
        ->set(EuLoginUserProvider::class)
        ->decorate(CasUserProviderInterface::class)
        ->arg('$casUserProvider', service('.inner'));

    $services
        ->set(EcasProperties::class)
        ->decorate(PropertiesInterface::class)
        ->arg('$casProperties', service('.inner'));

    $services
        ->set('ecas.configuration', EcasProperties::class)
        ->decorate('cas.configuration')
        ->arg('$casProperties', service('ecas.configuration.inner'));

    $services
        ->set('ecas', Ecas::class)
        ->decorate('cas')
        ->arg('$cas', service('ecas.inner'));
};
