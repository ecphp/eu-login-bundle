<?php

declare(strict_types=1);

namespace drupol\EuloginBundle\Security\Core\User;

use drupol\CasBundle\Security\Core\User\CasUserInterface;
use drupol\CasBundle\Security\Core\User\CasUserProviderInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Interface EuloginUserProviderInterface.
 */
interface EuloginUserProviderInterface extends CasUserProviderInterface
{
    /**
     * @param \Psr\Http\Message\ResponseInterface $response
     *
     * @return \drupol\CasBundle\Security\Core\User\CasUserInterface|\drupol\EuloginBundle\Security\Core\User\EuloginUserInterface
     */
    public function loadUserByResponse(ResponseInterface $response): CasUserInterface;
}
