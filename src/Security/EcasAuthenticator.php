<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/ecphp
 */

declare(strict_types=1);

namespace EcPhp\EuLoginBundle\Security;

use EcPhp\CasBundle\Security\CasAuthenticator;
use EcPhp\Ecas\Handler\AttachClientFingerprintCookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\Authenticator\AbstractAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\EntryPoint\AuthenticationEntryPointInterface;

final class EcasAuthenticator extends AbstractAuthenticator implements AuthenticationEntryPointInterface
{
    public function __construct(
        private readonly CasAuthenticator $casAuthenticator
    ) {
    }

    public function authenticate(Request $request): Passport
    {
        return $this->casAuthenticator->authenticate($request);
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): ?Response
    {
        return $this->casAuthenticator->onAuthenticationFailure($request, $exception);
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): Response
    {
        $response = $this->casAuthenticator->onAuthenticationSuccess($request, $token, $firewallName);

        $response->headers->clearCookie(AttachClientFingerprintCookie::CLIENT_FINGERPRINT_ATTRIBUTE);

        return $response;
    }

    public function start(Request $request, ?AuthenticationException $authException = null): Response
    {
        return $this->casAuthenticator->start($request, $authException);
    }

    public function supports(Request $request): bool
    {
        return $this->casAuthenticator->supports($request);
    }
}
