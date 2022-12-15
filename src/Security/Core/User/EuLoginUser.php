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
use Symfony\Component\Security\Core\User\UserInterface;

final class EuLoginUser implements EuLoginUserInterface
{
    private CasUserInterface $user;

    public function __construct(CasUserInterface $user)
    {
        $this->user = $user;
    }

    public function __toString(): string
    {
        return $this->user->__toString();
    }

    public function eraseCredentials(): void
    {
        // null
    }

    public function get(string $key, $default = null)
    {
        return $this->user->get($key, $default);
    }

    public function getAssuranceLevel(): ?string
    {
        return $this->user->getAttribute('assuranceLevel');
    }

    public function getAttribute(string $key, $default = null)
    {
        return $this->user->getAttribute($key, $default);
    }

    public function getAttributes(): array
    {
        return $this->user->getAttributes();
    }

    public function getAuthenticationFactors(): array
    {
        return $this->user->getAttribute('authenticationFactors', []);
    }

    public function getDepartmentNumber(): ?string
    {
        return $this->user->getAttribute('departmentNumber');
    }

    public function getDomain(): ?string
    {
        return $this->user->getAttribute('domain');
    }

    public function getDomainUsername(): ?string
    {
        return $this->user->getAttribute('domainUsername');
    }

    public function getEmail(): ?string
    {
        return $this->user->getAttribute('email');
    }

    public function getEmployeeNumber(): ?string
    {
        return $this->user->getAttribute('employeeNumber');
    }

    public function getEmployeeType(): ?string
    {
        return $this->user->getAttribute('employeeType');
    }

    public function getExtendedAttributes(): array
    {
        return $this->getAttributes()['extendedAttributes'] ?? [];
    }

    public function getFirstName(): ?string
    {
        return $this->user->getAttribute('firstName');
    }

    public function getGroups(): array
    {
        return $this->getAttributes()['groups'] ?? [];
    }

    public function getLastName(): ?string
    {
        return $this->user->getAttribute('lastName');
    }

    public function getLocale(): ?string
    {
        return $this->user->getAttribute('locale');
    }

    public function getLoginDate(): ?string
    {
        return $this->user->getAttribute('loginDate');
    }

    public function getOrgId(): ?string
    {
        return $this->user->getAttribute('orgId');
    }

    public function getPassword()
    {
        return null;
    }

    public function getPgt(): ?string
    {
        return $this->user->getPgt();
    }

    public function getProxyGrantingProtocol(): ?string
    {
        return $this->user->getAttribute('proxyGrantingProtocol');
    }

    public function getRoles(): array
    {
        return array_merge($this->getGroups(), ['ROLE_CAS_AUTHENTICATED']);
    }

    public function getSalt()
    {
        return null;
    }

    public function getSso(): ?string
    {
        return $this->user->getAttribute('sso');
    }

    public function getStrengths(): array
    {
        return $this->getAttributes()['strengths'] ?? [];
    }

    public function getTelephoneNumber(): ?string
    {
        return $this->user->getAttribute('telephoneNumber');
    }

    public function getTeleworkingPriority(): ?string
    {
        return $this->user->getAttribute('teleworkingPriority');
    }

    public function getTicketType(): ?string
    {
        return $this->user->getAttribute('ticketType');
    }

    public function getTimeZone(): ?string
    {
        return $this->user->getAttribute('timeZone');
    }

    public function getUid(): ?string
    {
        return $this->user->getAttribute('uid');
    }

    public function getUserIdentifier(): string
    {
        return $this->user->getUserIdentifier();
    }

    public function getUserManager(): ?string
    {
        return $this->user->getAttribute('userManager');
    }

    public function isEqualTo(UserInterface $user): bool
    {
        return $this->user->isEqualTo($user);
    }
}
