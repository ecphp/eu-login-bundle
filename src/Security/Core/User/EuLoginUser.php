<?php

declare(strict_types=1);

namespace EcPhp\EuLoginBundle\Security\Core\User;

use EcPhp\CasBundle\Security\Core\User\CasUserInterface;

use function array_key_exists;
use function is_array;

final class EuLoginUser implements EuLoginUserInterface
{
    /**
     * @var CasUserInterface
     */
    private $user;

    /**
     * EuLoginUser constructor.
     */
    public function __construct(CasUserInterface $user)
    {
        $this->user = $user;
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
     * @return string[]
     */
    public function getRoles()
    {
        $default = ['ROLE_CAS_AUTHENTICATED'];

        if (([] !== $roles = $this->getGroups()) && (array_key_exists('group', $roles) && is_array($roles['group']))) {
            return array_merge($roles['group'], $default);
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
        trigger_deprecation(
            'ecphp/eu-login-bundle',
            '2.2.3',
            'The method "%s::getUser()" is deprecated, use %s::getUsername() instead.',
            EuLoginUser::class
        );

        return $this->user->getUsername();
    }

    /**
     * {@inheritdoc}
     */
    public function getUsername()
    {
        return $this->user->getUsername();
    }
}
