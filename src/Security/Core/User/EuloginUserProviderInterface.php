<?php

declare(strict_types=1);

namespace drupol\EuloginBundle\Security\Core\User;

use drupol\CasBundle\Security\Core\User\CasUserInterface;
use drupol\CasBundle\Security\Core\User\CasUserProviderInterface;

/**
 * Interface EuloginUserProviderInterface.
 */
interface EuloginUserProviderInterface extends CasUserProviderInterface
{
    /**
     * @param array $data
     *
     * @return \drupol\CasBundle\Security\Core\User\CasUserInterface|\drupol\EuloginBundle\Security\Core\User\EuloginUserInterface
     */
    public function loadUserByArray(array $data): CasUserInterface;
}
