<?php

declare(strict_types=1);

namespace drupol\EuloginBundle\Security\Core\User;

use SimpleXMLElement;

/**
 * Class EuloginUser.
 */
final class EuloginUser implements EuloginUserInterface
{
    /**
     * The user storage.
     *
     * @var array
     */
    private $storage;

    /**
     * EuloginUser constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->storage = $data['serviceResponse']['authenticationSuccess'];
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
        return $this->get('assuranceLevel');
    }

    /**
     * {@inheritdoc}
     */
    public function getAttributes(): array
    {
        return $this->getStorage();
    }

    public function getDepartmentNumber()
    {
        // TODO: Implement getDepartmentNumber() method.
    }

    public function getDomain()
    {
        return $this->get('domain');
    }

    public function getDomainUsername()
    {
        return $this->get('domainUsername');
    }

    public function getEmail()
    {
        return $this->get('email');
    }

    public function getEmployeeNumber()
    {
        return $this->get('employeeNumber');
    }

    public function getEmployeeType()
    {
        return $this->get('employeeType');
    }

    public function getFirstName()
    {
        return $this->get('firstName');
    }

    public function getGroups()
    {
        return $this->get('groups');
    }

    public function getLastName()
    {
        return $this->get('lastName');
    }

    public function getLocale()
    {
        return $this->get('locale');
    }

    public function getLoginDate()
    {
        return $this->get('loginDate');
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
        return $this->get('proxyGrantingTicket');
    }

    /**
     * {@inheritdoc}
     */
    public function getPgtIOU(): ?string
    {
        return $this->get('proxyGrantingTicket');
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
        return $this->get('sso');
    }

    public function getStrengths()
    {
        return $this->get('strength');
    }

    public function getTelephoneNumber()
    {
        return $this->get('telephone');
    }

    public function getTeleworkingPriority()
    {
    }

    public function getTicketType()
    {
        return $this->get('ticketType');
    }

    public function getUid()
    {
        return $this->get('uid');
    }

    public function getUser()
    {
        return $this->get('user');
    }

    /**
     * {@inheritdoc}
     */
    public function getUsername()
    {
        return $this->get('user');
    }

    /**
     * {@inheritdoc}
     */
    public function withPgt(string $pgt): EuloginUser
    {
        $clone = clone $this;

        $clone->storage['proxyGrantingTicket'] = $pgt;

        return $clone;
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
    private function get($key)
    {
        return $this->getStorage()[$key] ?? null;
    }

    /**
     * Get the storage.
     *
     * @return array
     */
    private function getStorage()
    {
        return $this->storage;
    }

    /**
     * @param SimpleXMLElement $data
     *
     * @return array
     */
    private function parseXml(SimpleXMLElement $data): array
    {
        $array = [];

        foreach ((array) $data as $index => $node) {
            $array[$index] = ($node instanceof SimpleXMLElement) ? $this->parseXml($node) : (string) $node;
        }

        return $array;
    }
}
