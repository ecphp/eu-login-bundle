<?php

declare(strict_types=1);

namespace EcPhp\EuLoginBundle\Security\Core\User;

use EcPhp\CasBundle\Security\Core\User\CasUser;
use EcPhp\CasBundle\Security\Core\User\CasUserInterface;
use EcPhp\CasLib\Introspection\Contract\ServiceValidate;
use EcPhp\CasLib\Introspection\Introspector;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\UserInterface;

use function get_class;

/**
 * Class EuLoginUserProvider.
 */
class EuLoginUserProvider implements EuLoginUserProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function loadUserByResponse(ResponseInterface $response): CasUserInterface
    {
        /** @var ServiceValidate $introspect */
        $introspect = Introspector::detect($response);

        return new EuLoginUser(
            new CasUser(
                $this->normalizeUserData(
                    $introspect->getParsedResponse()['serviceResponse']['authenticationSuccess']
                )
            )
        );
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
        if (!$user instanceof EuLoginUserInterface) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', get_class($user)));
        }

        return $user;
    }

    /**
     * {@inheritdoc}
     */
    public function supportsClass($class)
    {
        return EuLoginUser::class === $class;
    }

    /**
     * Normalize user data from EU Login to standard CAS user data.
     *
     * @param array<array|string> $data
     *   The data from EU Login
     *
     * @return array<array|string>
     *   The normalized data.
     */
    private function normalizeUserData(array $data): array
    {
        $storage = [];
        $rootAttributes = ['user', 'proxyGrantingTicket', 'proxies'];

        foreach ($rootAttributes as $rootAttribute) {
            $storage[$rootAttribute] = $data[$rootAttribute] ?? null;
        }
        $storage['attributes'] = array_diff_key($data, array_flip($rootAttributes));

        return array_filter($storage) + ['attributes' => []];
    }
}
