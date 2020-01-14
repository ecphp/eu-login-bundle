<?php

declare(strict_types=1);

namespace EcPhp\EuLoginBundle\Security\Core\User;

use EcPhp\CasBundle\Security\Core\User\CasUserInterface;
use EcPhp\CasBundle\Security\Core\User\CasUserProviderInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Interface EuLoginUserProviderInterface.
 */
interface EuLoginUserProviderInterface extends CasUserProviderInterface
{
    /**
     * @param \Psr\Http\Message\ResponseInterface $response
     *
     * @return \EcPhp\CasBundle\Security\Core\User\CasUserInterface|\EcPhp\EuLoginBundle\Security\Core\User\EuLoginUserInterface
     */
    public function loadUserByResponse(ResponseInterface $response): CasUserInterface;
}
