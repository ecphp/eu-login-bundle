<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/ecphp
 */

declare(strict_types=1);

namespace spec\EcPhp\EuLoginBundle\Security\Core\User;

use EcPhp\CasBundle\Security\Core\User\CasUser;
use EcPhp\CasBundle\Security\Core\User\CasUserProviderInterface;
use EcPhp\CasLib\Contract\Response\CasResponseBuilderInterface;
use EcPhp\EuLoginBundle\Security\Core\User\EuLoginUser;
use EcPhp\EuLoginBundle\Security\Core\User\EuLoginUserInterface;
use EcPhp\EuLoginBundle\Security\Core\User\EuLoginUserProvider;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Bridge\PsrHttpMessage\HttpMessageFactoryInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\InMemoryUser;

class EuLoginUserProviderSpec extends ObjectBehavior
{
    public function it_can_check_if_the_user_class_is_supported()
    {
        $this
            ->supportsClass(EuLoginUser::class)
            ->shouldReturn(true);

        $this
            ->supportsClass(InMemoryUser::class)
            ->shouldReturn(false);
    }

    public function it_can_load_a_user_from_a_response(
        CasResponseBuilderInterface $casResponseBuilder,
        HttpMessageFactoryInterface $httpMessageFactory,
        CasUserProviderInterface $casUserProvider
    ) {
        $this
            ->beConstructedWith(
                $casUserProvider,
                $casResponseBuilder
            );

        $payload = [
            'departmentNumber' => 'departmentNumber',
            'email' => 'email',
            'employeeNumber' => 'employeeNumber',
            'employeeType' => 'employeeType',
            'firstName' => 'firstName',
            'lastName' => 'lastName',
            'domain' => 'domain',
            'domainUsername' => 'domainUsername',
            'telephoneNumber' => 'telephoneNumber',
            'userManager' => 'userManager',
            'timeZone' => 'timeZone',
            'locale' => 'locale',
            'assuranceLevel' => 'assuranceLevel',
            'uid' => 'uid',
            'orgId' => 'orgId',
            'teleworkingPriority' => 'teleworkingPriority',
            'extendedAttributes' => [
                'extendedAttribute' => [
                    'extendedAttribute1' => [
                        'value1',
                        'value2',
                    ],
                    'extendedAttribute2' => [
                        'value3',
                        'value4',
                    ],
                ],
            ],
            'groups' => [
                'group1',
                'group2',
            ],
            'strengths' => [
                'strength1',
                'strength2',
            ],
            'authenticationFactors' => [
                'moniker' => 'moniker1',
            ],
            'loginDate' => '',
            'sso' => 'sso',
            'ticketType' => 'ticketType',
            'proxyGrantingProtocol' => 'proxyGrantingProtocol',
        ];

        // TestBody1
        $response = new Response('', 200, ['content-type' => 'application/json']);

        $casUserProvider
            ->loadUserByResponse($response)
            ->willReturn(new CasUser($payload));

        $user = $this
            ->loadUserByResponse($response);

        $user
            ->shouldBeAnInstanceOf(EuLoginUser::class);
    }

    public function it_can_refresh_a_user(EuLoginUserInterface $user)
    {
        $this
            ->shouldThrow(UnsupportedUserException::class)
            ->during('refreshUser', [new InMemoryUser('foo', 'bar')]);
    }

    public function it_cannot_load_a_user_by_identifier()
    {
        $this
            ->shouldThrow(UnsupportedUserException::class)
            ->during('loadUserByIdentifier', ['foo']);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(EuLoginUserProvider::class);
    }

    public function let(
        CasResponseBuilderInterface $casResponseBuilder,
        HttpMessageFactoryInterface $httpMessageFactory,
        CasUserProviderInterface $casUserProvider
    ) {
        $casUserProvider
            ->loadUserByIdentifier(Argument::any())
            ->willThrow(UnsupportedUserException::class);

        $casUserProvider
            ->refreshUser(Argument::any())
            ->willThrow(UnsupportedUserException::class);

        $this
            ->beConstructedWith(
                $casUserProvider,
                $casResponseBuilder
            );
    }
}
