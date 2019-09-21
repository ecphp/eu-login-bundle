<?php

declare(strict_types=1);

namespace drupol\EuloginBundle\Security\Core\User;

use drupol\CasBundle\Security\Core\User\CasUserInterface;

interface EuloginUserInterface extends CasUserInterface
{
    public function getAssuranceLevel();

    public function getAttributes(): array;

    public function getDepartmentNumber();

    public function getDomain();

    public function getDomainUsername();

    public function getEmail();

    public function getEmployeeNumber();

    public function getEmployeeType();

    public function getFirstName();

    public function getGroups();

    public function getLastName();

    public function getLocale();

    public function getLoginDate();

    public function getOrgId();

    public function getPgt(): ?string;

    public function getPgtIOU(): ?string;

    public function getSso();

    public function getStrengths();

    public function getTelephoneNumber();

    public function getTeleworkingPriority();

    public function getTicketType();

    public function getUid();

    public function getUser();
}
