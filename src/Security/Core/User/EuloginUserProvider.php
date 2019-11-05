<?php

declare(strict_types=1);

namespace drupol\EuloginBundle\Security\Core\User;

use drupol\CasBundle\Security\Core\User\CasUserInterface;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\UserInterface;

use function get_class;

class EuloginUserProvider implements EuloginUserProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function loadUserByResponse(ResponseInterface $response): CasUserInterface
    {
        if (false === $user = json_decode((string) $response->getBody(), true)) {
            throw new AuthenticationException('Unable to load user from response.');
        }

        return new EuloginUser($user['serviceResponse']['authenticationSuccess']);
    }

    /**
     * {@inheritdoc}
     */
    public function loadUserByUsername($username)
    {
        throw new UnsupportedUserException(sprintf('Username "%s" does not exist.', $username));
    }

    /**
     * {@inheritdoc}
     */
    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof EuloginUserInterface) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', get_class($user)));
        }

        return $user;
    }

    /**
     * {@inheritdoc}
     */
    public function supportsClass($class)
    {
        return EuloginUser::class === $class;
    }
}
