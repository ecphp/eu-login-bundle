<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/ecphp
 */

declare(strict_types=1);

namespace spec\EcPhp\EuLoginBundle\Security\Core\User;

use EcPhp\CasBundle\Security\Core\User\CasUserProvider;
use EcPhp\CasLib\Response\CasResponseBuilder;
use EcPhp\CasLib\Response\Factory\AuthenticationFailureFactory;
use EcPhp\CasLib\Response\Factory\ProxyFactory;
use EcPhp\CasLib\Response\Factory\ProxyFailureFactory;
use EcPhp\CasLib\Response\Factory\ServiceValidateFactory as FactoryServiceValidateFactory;
use EcPhp\Ecas\Response\Factory\ServiceValidateFactory;
use EcPhp\EuLoginBundle\Security\Core\User\EuLoginUser;
use EcPhp\EuLoginBundle\Security\Core\User\EuLoginUserInterface;
use EcPhp\EuLoginBundle\Security\Core\User\EuLoginUserProvider;
use loophp\psr17\Psr17;
use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7\Response;
use PhpSpec\ObjectBehavior;
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

    public function it_can_load_a_user_from_a_response(): void
    {
        // TestBody1
        $response = new Response(200, ['content-type' => 'application/xml'], $this->getTestBody1());

        $psr17f = new Psr17Factory();
        $psr17 = new Psr17($psr17f, $psr17f, $psr17f, $psr17f, $psr17f, $psr17f);
        $responseBuilder = new CasResponseBuilder(
            new AuthenticationFailureFactory(),
            new ProxyFactory(),
            new ProxyFailureFactory(),
            new ServiceValidateFactory(new FactoryServiceValidateFactory(), $psr17)
        );

        $user = $this
            ->loadUserByResponse(
                $responseBuilder->fromResponse($response)
            );

        $user
            ->getAttributes()
            ->shouldReturn(
                [
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
                            [
                                'attributeValue' => [
                                    'value1',
                                    'value2',
                                ],
                                '@attributes' => [
                                    'name' => 'extendedAttribute1',
                                ],
                            ],
                            [
                                'attributeValue' => [
                                    'value3',
                                    'value4',
                                ],
                                '@attributes' => [
                                    'name' => 'extendedAttribute2',
                                ],
                            ],
                        ],
                    ],
                    'groups' => [
                        'group' => [
                            'group1',
                            'group2',
                        ],
                        '@attributes' => [
                            'number' => '2',
                        ],
                    ],
                    'strengths' => [
                        'strength' => [
                            'strength1',
                            'strength2',
                        ],
                        '@attributes' => [
                            'number' => '2',
                        ],
                    ],
                    'authenticationFactors' => [
                        'moniker' => 'moniker1',
                        '@attributes' => [
                            'number' => '1',
                        ],
                    ],
                    'loginDate' => '',
                    'sso' => 'sso',
                    'ticketType' => 'ticketType',
                    'proxyGrantingProtocol' => 'proxyGrantingProtocol',
                ]
            );

        $user
            ->getExtendedAttributes()
            ->shouldReturn([
                'extendedAttribute1' => [
                    'value1',
                    'value2',
                ],
                'extendedAttribute2' => [
                    'value3',
                    'value4',
                ],
            ]);

        $user
            ->getGroups()
            ->shouldReturn([
                'group1',
                'group2',
            ]);

        $user
            ->getStrengths()
            ->shouldReturn([
                'strength1',
                'strength2',
            ]);

        // TestBody2
        $response = new Response(
            200,
            ['content-type' => 'application/xml'],
            $this->getTestBody2()
        );

        $user = $this
            ->loadUserByResponse(
                $responseBuilder->fromResponse($response)
            );

        $user
            ->getAttributes()
            ->shouldReturn(
                [
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
                            [
                                'attributeValue' => [
                                    'value1',
                                    'value2',
                                ],
                                '@attributes' => [
                                    'name' => 'extendedAttribute1',
                                ],
                            ],
                        ],
                    ],
                    'groups' => [
                        'group' => [
                            'group1',
                        ],
                        '@attributes' => [
                            'number' => '1',
                        ],
                    ],
                    'strengths' => [
                        'strength' => [
                            'strength1',
                        ],
                        '@attributes' => [
                            'number' => '1',
                        ],
                    ],
                    'authenticationFactors' => [
                        'moniker' => 'moniker1',
                        '@attributes' => [
                            'number' => '1',
                        ],
                    ],
                    'loginDate' => '',
                    'sso' => 'sso',
                    'ticketType' => 'ticketType',
                    'proxyGrantingProtocol' => 'proxyGrantingProtocol',
                ]
            );

        $user
            ->getExtendedAttributes()
            ->shouldReturn([
                'extendedAttribute1' => [
                    'value1',
                    'value2',
                ],
            ]);

        $user
            ->getGroups()
            ->shouldReturn([
                'group1',
            ]);

        $user
            ->getStrengths()
            ->shouldReturn([
                'strength1',
            ]);
    }

    public function it_can_refresh_a_user(EuLoginUserInterface $user)
    {
        $this
            ->shouldThrow(UnsupportedUserException::class)
            ->during('refreshUser', [new InMemoryUser('foo', 'bar')]);

        $this
            ->refreshUser($user)
            ->shouldReturn($user);
    }

    public function it_cannot_load_a_user_by_username()
    {
        $this
            ->shouldThrow(UnsupportedUserException::class)
            ->during('loadUserByUsername', ['foo']);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(EuLoginUserProvider::class);
    }

    public function let()
    {
        $this
            ->beConstructedWith(new CasUserProvider());
    }

    private function getTestBody1()
    {
        return <<< 'EOF'
            <?xml version="1.0" encoding="utf-8"?>
            <cas:serviceResponse xmlns:cas="https://ecas.ec.europa.eu/cas/schemas/" date="" version="">
                <cas:authenticationSuccess>
                    <cas:user>username</cas:user>
                    <cas:departmentNumber>departmentNumber</cas:departmentNumber>
                    <cas:email>email</cas:email>
                    <cas:employeeNumber>employeeNumber</cas:employeeNumber>
                    <cas:employeeType>employeeType</cas:employeeType>
                    <cas:firstName>firstName</cas:firstName>
                    <cas:lastName>lastName</cas:lastName>
                    <cas:domain>domain</cas:domain>
                    <cas:domainUsername>domainUsername</cas:domainUsername>
                    <cas:telephoneNumber>telephoneNumber</cas:telephoneNumber>
                    <cas:userManager>userManager</cas:userManager>
                    <cas:timeZone>timeZone</cas:timeZone>
                    <cas:locale>locale</cas:locale>
                    <cas:assuranceLevel>assuranceLevel</cas:assuranceLevel>
                    <cas:uid>uid</cas:uid>
                    <cas:orgId>orgId</cas:orgId>
                    <cas:teleworkingPriority>teleworkingPriority</cas:teleworkingPriority>
                    <cas:extendedAttributes>
                        <cas:extendedAttribute name="extendedAttribute1">
                            <cas:attributeValue>value1</cas:attributeValue>
                            <cas:attributeValue>value2</cas:attributeValue>
                        </cas:extendedAttribute>
                        <cas:extendedAttribute name="extendedAttribute2">
                            <cas:attributeValue>value3</cas:attributeValue>
                            <cas:attributeValue>value4</cas:attributeValue>
                        </cas:extendedAttribute>
                    </cas:extendedAttributes>
                    <cas:groups number="2">
                        <cas:group>group1</cas:group>
                        <cas:group>group2</cas:group>
                    </cas:groups>
                    <cas:strengths number="2">
                        <cas:strength>strength1</cas:strength>
                        <cas:strength>strength2</cas:strength>
                    </cas:strengths>
                    <cas:authenticationFactors number="1">
                        <cas:moniker>moniker1</cas:moniker>
                    </cas:authenticationFactors>
                    <cas:loginDate></cas:loginDate>
                    <cas:sso>sso</cas:sso>
                    <cas:ticketType>ticketType</cas:ticketType>
                    <cas:proxyGrantingProtocol>proxyGrantingProtocol</cas:proxyGrantingProtocol>
                    <cas:proxies>
                        <cas:proxy>proxy1</cas:proxy>
                    </cas:proxies>
                </cas:authenticationSuccess>
            </cas:serviceResponse>
            EOF;
    }

    private function getTestBody2()
    {
        return <<< 'EOF'
            <?xml version="1.0" encoding="utf-8"?>
            <cas:serviceResponse xmlns:cas="https://ecas.ec.europa.eu/cas/schemas/" date="" version="">
                <cas:authenticationSuccess>
                    <cas:user>username</cas:user>
                    <cas:departmentNumber>departmentNumber</cas:departmentNumber>
                    <cas:email>email</cas:email>
                    <cas:employeeNumber>employeeNumber</cas:employeeNumber>
                    <cas:employeeType>employeeType</cas:employeeType>
                    <cas:firstName>firstName</cas:firstName>
                    <cas:lastName>lastName</cas:lastName>
                    <cas:domain>domain</cas:domain>
                    <cas:domainUsername>domainUsername</cas:domainUsername>
                    <cas:telephoneNumber>telephoneNumber</cas:telephoneNumber>
                    <cas:userManager>userManager</cas:userManager>
                    <cas:timeZone>timeZone</cas:timeZone>
                    <cas:locale>locale</cas:locale>
                    <cas:assuranceLevel>assuranceLevel</cas:assuranceLevel>
                    <cas:uid>uid</cas:uid>
                    <cas:orgId>orgId</cas:orgId>
                    <cas:teleworkingPriority>teleworkingPriority</cas:teleworkingPriority>
                    <cas:extendedAttributes>
                        <cas:extendedAttribute name="extendedAttribute1">
                            <cas:attributeValue>value1</cas:attributeValue>
                            <cas:attributeValue>value2</cas:attributeValue>
                        </cas:extendedAttribute>
                    </cas:extendedAttributes>
                    <cas:groups number="1">
                        <cas:group>group1</cas:group>
                    </cas:groups>
                    <cas:strengths number="1">
                        <cas:strength>strength1</cas:strength>
                    </cas:strengths>
                    <cas:authenticationFactors number="1">
                        <cas:moniker>moniker1</cas:moniker>
                    </cas:authenticationFactors>
                    <cas:loginDate></cas:loginDate>
                    <cas:sso>sso</cas:sso>
                    <cas:ticketType>ticketType</cas:ticketType>
                    <cas:proxyGrantingProtocol>proxyGrantingProtocol</cas:proxyGrantingProtocol>
                    <cas:proxies>
                        <cas:proxy>proxy1</cas:proxy>
                    </cas:proxies>
                </cas:authenticationSuccess>
            </cas:serviceResponse>
            EOF;
    }
}
