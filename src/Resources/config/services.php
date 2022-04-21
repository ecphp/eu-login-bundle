<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/ecphp
 */

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use EcPhp\CasLib\Contract\CasInterface;
use EcPhp\CasLib\Contract\Configuration\PropertiesInterface;
use EcPhp\CasLib\Contract\Response\CasResponseBuilderInterface;
use EcPhp\Ecas\Ecas;
use EcPhp\Ecas\EcasProperties;
use EcPhp\Ecas\Response\EcasResponseBuilder;
use EcPhp\EuLoginBundle\Security\Core\User\EuLoginUserProvider;

return static function (ContainerConfigurator $container) {
    $services = $container->services();

    $services
        ->defaults()
        ->autoconfigure(true)
        ->autowire(true);

    $services
        ->set(EcasResponseBuilder::class)
        ->decorate(CasResponseBuilderInterface::class)
        ->arg('$casResponseBuilder', service('.inner'));

    $services
        ->set('eulogin.userprovider', EuLoginUserProvider::class)
        ->arg('$casUserProvider', service('cas.userprovider'));

    $services
        ->set(EcasProperties::class)
        ->decorate(PropertiesInterface::class)
        ->arg('$casProperties', service('.inner'));

    $services
        ->set(Ecas::class)
        ->decorate(CasInterface::class)
        ->arg('$cas', service('.inner'));
};
