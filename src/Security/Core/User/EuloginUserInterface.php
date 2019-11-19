<?php

declare(strict_types=1);

namespace drupol\EuloginBundle\Security\Core\User;

use drupol\CasBundle\Security\Core\User\CasUserInterface;

/**
 * Interface EuloginUserInterface.
 */
interface EuloginUserInterface extends CasUserInterface
{
    /**
     * @return string|null
     */
    public function getAssuranceLevel(): ?string;

    /**
     * @return string|null
     */
    public function getDepartmentNumber(): ?string;

    /**
     * @return string|null
     */
    public function getDomain(): ?string;

    /**
     * @return string|null
     */
    public function getDomainUsername(): ?string;

    /**
     * @return string|null
     */
    public function getEmail(): ?string;

    /**
     * @return string|null
     */
    public function getEmployeeNumber(): ?string;

    /**
     * @return string|null
     */
    public function getEmployeeType(): ?string;

    /**
     * @return string|null
     */
    public function getFirstName(): ?string;

    /**
     * @return array
     */
    public function getGroups(): array;

    /**
     * @return string|null
     */
    public function getLastName(): ?string;

    /**
     * @return string|null
     */
    public function getLocale(): ?string;

    /**
     * @return string|null
     */
    public function getLoginDate(): ?string;

    /**
     * @return string|null
     */
    public function getOrgId(): ?string;

    /**
     * @return string|null
     */
    public function getSso(): ?string;

    /**
     * @return array
     */
    public function getStrengths(): array;

    /**
     * @return string|null
     */
    public function getTelephoneNumber(): ?string;

    /**
     * @return string|null
     */
    public function getTeleworkingPriority(): ?string;

    /**
     * @return string|null
     */
    public function getTicketType(): ?string;

    /**
     * @return string|null
     */
    public function getUid(): ?string;
}
