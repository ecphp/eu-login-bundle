<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/ecphp
 */

declare(strict_types=1);

namespace EcPhp\EuLoginBundle\Security\Core\User;

use EcPhp\CasBundle\Security\Core\User\CasUserInterface;
use EcPhp\CasBundle\Security\Core\User\CasUserProviderInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\UserInterface;

final class EuLoginUserProvider implements CasUserProviderInterface
{
    public function __construct(
        private readonly CasUserProviderInterface $casUserProvider
    ) {}

    public function loadUserByIdentifier(string $identifier): UserInterface
    {
        return $this->casUserProvider->loadUserByIdentifier($identifier);
    }

    public function loadUserByResponse(Response $response): CasUserInterface
    {
        return new EuLoginUser($this->casUserProvider->loadUserByResponse($response));
    }

    public function refreshUser(UserInterface $user): UserInterface
    {
        return $this->casUserProvider->refreshUser($user);
    }

    public function supportsClass(string $class): bool
    {
        return EuLoginUser::class === $class;
    }
}
