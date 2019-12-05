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
     * @param array<mixed> $data
     */
    public function __construct(array $data)
    {
        $this->user = new CasUser($this->normalizeUserData($data));
    }

    /**
     * {@inheritdoc}
     */
    public function eraseCredentials(): void
    {
        // null
    }

    /**
     * {@inheritdoc}
     */
    public function get(string $key, $default = null)
    {
        return $this->user->get($key, $default);
    }

    /**
     * {@inheritdoc}
     */
    public function getAssuranceLevel(): ?string
    {
        return $this->user->getAttribute('assuranceLevel');
    }

    /**
     * {@inheritdoc}
     */
    public function getAttribute(string $key, $default = null)
    {
        return $this->user->getAttribute($key, $default);
    }

    /**
     * {@inheritdoc}
     */
    public function getAttributes(): array
    {
        return $this->user->getAttributes();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthenticationFactors(): array
    {
        return $this->user->getAttribute('authenticationFactors', []);
    }

    /**
     * {@inheritdoc}
     */
    public function getDepartmentNumber(): ?string
    {
        return $this->user->getAttribute('departmentNumber');
    }

    /**
     * {@inheritdoc}
     */
    public function getDomain(): ?string
    {
        return $this->user->getAttribute('domain');
    }

    /**
     * {@inheritdoc}
     */
    public function getDomainUsername(): ?string
    {
        return $this->user->getAttribute('domainUsername');
    }

    /**
     * {@inheritdoc}
     */
    public function getEmail(): ?string
    {
        return $this->user->getAttribute('email');
    }

    /**
     * {@inheritdoc}
     */
    public function getEmployeeNumber(): ?string
    {
        return $this->user->getAttribute('employeeNumber');
    }

    /**
     * {@inheritdoc}
     */
    public function getEmployeeType(): ?string
    {
        return $this->user->getAttribute('employeeType');
    }

    /**
     * {@inheritdoc}
     */
    public function getFirstName(): ?string
    {
        return $this->user->getAttribute('firstName');
    }

    /**
     * {@inheritdoc}
     */
    public function getGroups(): array
    {
        return $this->user->getAttribute('groups', []);
    }

    /**
     * {@inheritdoc}
     */
    public function getLastName(): ?string
    {
        return $this->user->getAttribute('lastName');
    }

    /**
     * {@inheritdoc}
     */
    public function getLocale(): ?string
    {
        return $this->user->getAttribute('locale');
    }

    /**
     * {@inheritdoc}
     */
    public function getLoginDate(): ?string
    {
        return $this->user->getAttribute('loginDate');
    }

    /**
     * {@inheritdoc}
     */
    public function getOrgId(): ?string
    {
        return $this->user->getAttribute('orgId');
    }

    /**
     * {@inheritdoc}
     */
    public function getPassword()
    {
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getPgt(): ?string
    {
        return $this->user->getPgt();
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
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getSso(): ?string
    {
        return $this->user->getAttribute('sso');
    }

    /**
     * {@inheritdoc}
     */
    public function getStrengths(): array
    {
        return $this->user->getAttribute('strengths', []);
    }

    /**
     * {@inheritdoc}
     */
    public function getTelephoneNumber(): ?string
    {
        return $this->user->getAttribute('telephoneNumber');
    }

    /**
     * {@inheritdoc}
     */
    public function getTeleworkingPriority(): ?string
    {
        return $this->user->getAttribute('teleworkingPriority');
    }

    /**
     * {@inheritdoc}
     */
    public function getTicketType(): ?string
    {
        return $this->user->getAttribute('ticketType');
    }

    /**
     * {@inheritdoc}
     */
    public function getUid(): ?string
    {
        return $this->user->getAttribute('uid');
    }

    /**
     * {@inheritdoc}
     */
    public function getUser(): string
    {
        return $this->user->getUser();
    }

    /**
     * {@inheritdoc}
     */
    public function getUsername()
    {
        return $this->getUser();
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
