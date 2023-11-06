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
    public function __construct(
        private readonly CasUserInterface $user
    ) {}

    public function __toString(): string
    {
        return $this->user->__toString();
    }

    public function eraseCredentials(): void {}

    public function get(string $key, mixed $default = null): mixed
    {
        return $this->user->get($key, $default);
    }

    public function getAssuranceLevel(): ?string
    {
        return $this->get('assuranceLevel');
    }

    public function getAuthenticationFactors(): array
    {
        return $this->get('authenticationFactors', []);
    }

    public function getDepartmentNumber(): ?string
    {
        return $this->get('departmentNumber');
    }

    public function getDomain(): ?string
    {
        return $this->get('domain');
    }

    public function getDomainUsername(): ?string
    {
        return $this->get('domainUsername');
    }

    public function getEmail(): ?string
    {
        return $this->get('email');
    }

    public function getEmployeeNumber(): ?string
    {
        return $this->get('employeeNumber');
    }

    public function getEmployeeType(): ?string
    {
        return $this->get('employeeType');
    }

    public function getExtendedAttributes(): array
    {
        return $this->get('extendedAttributes', []);
    }

    public function getFirstName(): ?string
    {
        return $this->get('firstName');
    }

    public function getGroups(): array
    {
        return $this->get('groups', []);
    }

    public function getLastName(): ?string
    {
        return $this->get('lastName');
    }

    public function getLocale(): ?string
    {
        return $this->get('locale');
    }

    public function getLoginDate(): ?string
    {
        return $this->get('loginDate');
    }

    public function getOrgId(): ?string
    {
        return $this->get('orgId');
    }

    public function getPayload(): array
    {
        return $this->user->getPayload();
    }

    public function getPgt(): ?string
    {
        return $this->user->getPgt();
    }

    public function getProxyGrantingProtocol(): ?string
    {
        return $this->get('proxyGrantingProtocol');
    }

    public function getRoles(): array
    {
        $default = ['ROLE_CAS_AUTHENTICATED'];

        return array_merge($this->getGroups(), $default);
    }

    public function getSso(): bool
    {
        return $this->get('sso', false);
    }

    public function getStrengths(): array
    {
        return $this->get('strengths', []);
    }

    public function getTelephoneNumber(): ?string
    {
        return $this->get('telephoneNumber');
    }

    public function getTeleworkingPriority(): bool
    {
        return $this->get('teleworkingPriority', false);
    }

    public function getTicketType(): ?string
    {
        return $this->get('ticketType');
    }

    public function getTimeZone(): ?string
    {
        return $this->get('timeZone');
    }

    public function getUid(): ?string
    {
        return $this->get('uid');
    }

    public function getUserIdentifier(): string
    {
        return $this->user->getUserIdentifier();
    }

    public function getUserManager(): ?string
    {
        return $this->get('userManager');
    }

    public function isEqualTo(UserInterface $user): bool
    {
        return $this->user->isEqualTo($user);
    }
}
