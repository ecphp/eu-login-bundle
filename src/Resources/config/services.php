<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/ecphp
 */

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use EcPhp\CasBundle\Security\Core\User\CasUserProviderInterface;
use EcPhp\CasLib\Contract\CasInterface;
use EcPhp\CasLib\Contract\Configuration\PropertiesInterface;
use EcPhp\CasLib\Contract\Response\CasResponseBuilderInterface;
use EcPhp\Ecas\Ecas;
use EcPhp\Ecas\EcasProperties;
use EcPhp\Ecas\Response\EcasResponseBuilder;
use EcPhp\Ecas\Service\Fingerprint\DefaultFingerprint;
use EcPhp\Ecas\Service\Fingerprint\Fingerprint;
use EcPhp\EuLoginBundle\Security\Core\User\EuLoginUserProvider;
use EcPhp\EuLoginBundle\Security\EcasAuthenticator;

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
        ->set(Ecas::class)
        ->decorate(CasInterface::class)
        ->arg('$cas', service('.inner'));

    $services
        ->set(EcasResponseBuilder::class)
        ->decorate(CasResponseBuilderInterface::class)
        ->arg('$casResponseBuilder', service('.inner'));

    $services
        ->set(DefaultFingerprint::class)
        ->alias(Fingerprint::class, DefaultFingerprint::class);

    $services
        ->set(EcasAuthenticator::class);
};
