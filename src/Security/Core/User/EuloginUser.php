<?php

declare(strict_types=1);

namespace drupol\EuloginBundle\Security\Core\User;

use drupol\CasBundle\Security\Core\User\CasUser;

/**
 * Class EuloginUser.
 */
final class EuloginUser implements EuloginUserInterface
{
    /**
     * @var \drupol\CasBundle\Security\Core\User\CasUser
     */
    private $user;

    /**
     * EuloginUser constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->user = new CasUser($this->normalizeUserData($data));
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return (string) $this->getUsername();
    }

    /**
     * {@inheritdoc}
     */
    public function eraseCredentials(): void
    {
        // null
    }

    public function getAssuranceLevel()
    {
        return $this->user->getAttribute('assuranceLevel');
    }

    /**
     * {@inheritdoc}
     */
    public function getAttributes(): array
    {
        return $this->user->getAttributes();
    }

    public function getDepartmentNumber()
    {
        // TODO: Implement getDepartmentNumber() method.
    }

    public function getDomain()
    {
        return $this->user->getAttribute('domain');
    }

    public function getDomainUsername()
    {
        return $this->user->getAttribute('domainUsername');
    }

    public function getEmail()
    {
        return $this->user->getAttribute('email');
    }

    public function getEmployeeNumber()
    {
        return $this->user->getAttribute('employeeNumber');
    }

    public function getEmployeeType()
    {
        return $this->user->getAttribute('employeeType');
    }

    public function getFirstName()
    {
        return $this->user->getAttribute('firstName');
    }

    public function getGroups()
    {
        return $this->user->getAttribute('groups');
    }

    public function getLastName()
    {
        return $this->user->getAttribute('lastName');
    }

    public function getLocale()
    {
        return $this->user->getAttribute('locale');
    }

    public function getLoginDate()
    {
        return $this->user->getAttribute('loginDate');
    }

    public function getOrgId()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getPassword()
    {
    }

    public function getPgt(): ?string
    {
        return $this->user->getAttribute('proxyGrantingTicket');
    }

    /**
     * {@inheritdoc}
     */
    public function getPgtIOU(): ?string
    {
        return $this->user->getAttribute('proxyGrantingTicket');
    }

    /**
     * {@inheritdoc}
     */
    public function getRoles()
    {
        $default = ['ROLE_CAS_AUTHENTICATED'];

        if ([] !== $roles = $this->getGroups()) {
            if (isset($roles['group'])) {
                return array_merge($roles['group'], $default);
            }
        }

        return $default;
    }

    /**
     * {@inheritdoc}
     */
    public function getSalt()
    {
    }

    public function getSso()
    {
        return $this->user->getAttribute('sso');
    }

    public function getStrengths()
    {
        return $this->user->getAttribute('strength');
    }

    public function getTelephoneNumber()
    {
        return $this->user->getAttribute('telephone');
    }

    public function getTeleworkingPriority()
    {
    }

    public function getTicketType()
    {
        return $this->user->getAttribute('ticketType');
    }

    public function getUid()
    {
        return $this->user->getAttribute('uid');
    }

    public function getUser()
    {
        return $this->user->getAttribute('user');
    }

    /**
     * {@inheritdoc}
     */
    public function getUsername()
    {
        return $this->user->getAttribute('user');
    }

    /**
     * Get a value.
     *
     * @param string $key
     *   The key.
     *
     * @return mixed
     *   The value.
     */
    private function getAttribute($key)
    {
        return $this->user->getAttribute($key);
    }

    /**
     * Normalize user data from EU Login to standard CAS user data.
     *
     * @param array $data
     *   The data from EU Login
     *
     * @return array
     *   The normalized data.
     */
    private function normalizeUserData(array $data): array
    {
        $storage = [];
        $rootAttributes = ['user', 'proxyGrantingTicket'];

        foreach ($rootAttributes as $rootAttribute) {
            $storage[$rootAttribute] = $data[$rootAttribute] ?? null;
        }
        $storage['attributes'] = array_diff_key($data, array_flip($rootAttributes));

        return array_filter($storage) + ['attributes' => []];
    }
}
