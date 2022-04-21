<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/ecphp
 */

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use EcPhp\CasBundle\Security\Core\User\CasUserProvider;
use EcPhp\CasLib\Contract\CasInterface;
use EcPhp\CasLib\Contract\Configuration\PropertiesInterface;
use EcPhp\CasLib\Contract\Response\Factory\ServiceValidateFactory as FactoryServiceValidateFactory;
use EcPhp\Ecas\Ecas;
use EcPhp\Ecas\EcasProperties;
use EcPhp\Ecas\Response\Factory\ServiceValidateFactory;
use EcPhp\EuLoginBundle\Security\Core\User\EuLoginUserProvider;

return static function (ContainerConfigurator $container) {
    $services = $container->services();

    $services
        ->defaults()
        ->autoconfigure(true)
        ->autowire(true);

    $services
        ->set(EuLoginUserProvider::class)
        ->arg('$casUserProvider', service(CasUserProvider::class));

    $services
        ->set(EcasProperties::class)
        ->decorate(PropertiesInterface::class)
        ->arg('$casProperties', service('.inner'));

    $services
        ->set(ServiceValidateFactory::class)
        ->decorate(FactoryServiceValidateFactory::class)
        ->arg('$serviceValidateFactory', service('.inner'));

    $services
        ->set(Ecas::class)
        ->decorate(CasInterface::class)
        ->arg('$cas', service('.inner'));
};
