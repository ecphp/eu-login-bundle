<?php

declare(strict_types=1);

namespace EcPhp\EuLoginBundle\Security\Core\User;

use EcPhp\CasBundle\Security\Core\User\CasUserInterface;

/**
 * Interface EuLoginUserInterface.
 */
interface EuLoginUserInterface extends CasUserInterface
{
    public function getAssuranceLevel(): ?string;

    /**
     * @return string[]
     */
    public function getAuthenticationFactors(): array;

    public function getDepartmentNumber(): ?string;

    public function getDomain(): ?string;

    public function getDomainUsername(): ?string;

    public function getEmail(): ?string;

    public function getEmployeeNumber(): ?string;

    public function getEmployeeType(): ?string;

    public function getFirstName(): ?string;

    /**
     * @return mixed[]
     */
    public function getGroups(): array;

    public function getLastName(): ?string;

    public function getLocale(): ?string;

    public function getLoginDate(): ?string;

    public function getOrgId(): ?string;

    public function getSso(): ?string;

    /**
     * @return string[]
     */
    public function getStrengths(): array;

    public function getTelephoneNumber(): ?string;

    public function getTeleworkingPriority(): ?string;

    public function getTicketType(): ?string;

    public function getUid(): ?string;
}
