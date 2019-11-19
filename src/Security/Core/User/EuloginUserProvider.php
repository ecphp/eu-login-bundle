<?php

declare(strict_types=1);

namespace drupol\EuloginBundle\Security\Core\User;

use drupol\CasBundle\Security\Core\User\CasUserInterface;
use drupol\psrcas\Introspection\Introspector;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\UserInterface;

use function get_class;

/**
 * Class EuloginUserProvider.
 */
class EuloginUserProvider implements EuloginUserProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function loadUserByResponse(ResponseInterface $response): CasUserInterface
    {
        /** @var \drupol\psrcas\Introspection\Contract\ServiceValidate $introspect */
        $introspect = Introspector::detect($response);

        return new EuloginUser($introspect->getParsedResponse()['serviceResponse']['authenticationSuccess']);
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
