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
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\UserInterface;

use function get_class;

final class EuLoginUserProvider implements CasUserProviderInterface
{
    /**
     * @var CasUserProviderInterface
     */
    private $casUserProvider;

    public function __construct(CasUserProviderInterface $casUserProvider)
    {
        $this->casUserProvider = $casUserProvider;
    }

    public function loadUserByResponse(ResponseInterface $response): CasUserInterface
    {
        return new EuLoginUser($this->casUserProvider->loadUserByResponse($response));
    }

    public function loadUserByUsername(string $username)
    {
        throw new UnsupportedUserException(sprintf('Username "%s" does not exist.', $username));
    }

    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof EuLoginUserInterface) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', get_class($user)));
        }

        return $user;
    }

    public function supportsClass(string $class)
    {
        return EuLoginUser::class === $class;
    }
}
