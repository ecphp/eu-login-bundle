<?php

declare(strict_types=1);

namespace EcPhp\EuLoginBundle\Security\Core\User;

use EcPhp\CasBundle\Security\Core\User\CasUserInterface;

use function array_key_exists;

final class EuLoginUser implements EuLoginUserInterface
{
    /**
     * @var CasUserInterface
     */
    private $user;

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

        return array_merge($this->getGroups(), $default);
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
