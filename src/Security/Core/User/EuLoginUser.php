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

use function array_key_exists;

final class EuLoginUser implements EuLoginUserInterface
{
    private CasUserInterface $user;

    public function __construct(CasUserInterface $user)
    {
        $this->user = $user;
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
        $attributes = $this->user->getAttributes();

        /** @Todo Ugly. Refactor this when JSON format will be available. */
        $propertyToMangle = [
            ['extendedAttributes', 'extendedAttribute'],
            ['groups', 'group'],
            ['strengths', 'strength'],
            ['authenticationFactors', 'authenticationFactor'],
        ];

        foreach ($propertyToMangle as [$parent, $child]) {
            if (!array_key_exists($parent, $attributes)) {
                continue;
            }

            if (!array_key_exists($child, $attributes[$parent])) {
                continue;
            }

            $attributes[$parent][$child] = (array) $attributes[$parent][$child];

            if (array_key_exists(0, $attributes[$parent][$child])) {
                continue;
            }

            $attributes[$parent][$child] = [$attributes[$parent][$child]];
        }

        return $attributes;
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
        $attributes = $this->getAttributes();

        if (!array_key_exists('extendedAttributes', $attributes)) {
            return [];
        }

        $extendedAttributes = $attributes['extendedAttributes'];

        if (!array_key_exists('extendedAttribute', $extendedAttributes)) {
            return [];
        }

        $extendedAttributes = $attributes['extendedAttributes']['extendedAttribute'];

        return array_reduce(
            $extendedAttributes,
            static function (array $carry, array $item): array {
                $carry[$item['@attributes']['name']] = $item['attributeValue'];

                return $carry;
            },
            []
        );
    }

    public function getFirstName(): ?string
    {
        return $this->user->getAttribute('firstName');
    }

    public function getGroups(): array
    {
        $attributes = $this->getAttributes();

        if (!array_key_exists('groups', $attributes)) {
            return [];
        }

        $groups = $attributes['groups'];

        if (!array_key_exists('group', $groups)) {
            return [];
        }

        return $groups['group'];
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

    public function getRoles()
    {
        $default = ['ROLE_CAS_AUTHENTICATED'];

        return array_merge($this->getGroups(), $default);
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
        $attributes = $this->getAttributes();

        if (!array_key_exists('strengths', $attributes)) {
            return [];
        }

        $strengths = $attributes['strengths'];

        if (!array_key_exists('strength', $strengths)) {
            return [];
        }

        return (array) $strengths['strength'];
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

    /**
     * @deprecated use getUserIdentifier() instead
     */
    public function getUser(): string
    {
        trigger_deprecation(
            'ecphp/eu-login-bundle',
            '2.2.3',
            'The method "%s::getUser()" is deprecated, use %s::getUserIdentifier() instead.',
            EuLoginUser::class
        );

        return $this->user->getUsername();
    }

    public function getUserIdentifier()
    {
        return $this->user->getUserIdentifier();
    }

    public function getUserManager(): ?string
    {
        return $this->user->getAttribute('userManager');
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier() instead
     */
    public function getUsername()
    {
        trigger_deprecation(
            'ecphp/eu-login-bundle',
            '2.3.8',
            'The method "%s::getUsername()" is deprecated, use %s::getUserIdentifier() instead.',
            EuLoginUser::class
        );

        return $this->user->getUsername();
    }

    public function isEqualTo(UserInterface $user)
    {
        return $this->user->isEqualTo($user);
    }
}
