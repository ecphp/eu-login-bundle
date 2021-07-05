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

    public function getExtendedAttributes(): array;

    public function getFirstName(): ?string;

    /**
     * @return mixed[]
     */
    public function getGroups(): array;

    public function getLastName(): ?string;

    public function getLocale(): ?string;

    public function getLoginDate(): ?string;

    public function getOrgId(): ?string;

    public function getProxyGrantingProtocol(): ?string;

    public function getSso(): ?string;

    /**
     * @return string[]
     */
    public function getStrengths(): array;

    public function getTelephoneNumber(): ?string;

    public function getTeleworkingPriority(): ?string;

    public function getTicketType(): ?string;

    public function getTimeZone(): ?string;

    public function getUid(): ?string;

    public function getUserManager(): ?string;
}
