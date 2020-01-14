<?php

declare(strict_types=1);

namespace spec\EcPhp\EuLoginBundle\Security\Core\User;

use EcPhp\EuLoginBundle\Security\Core\User\EuLoginUser;
use PhpSpec\ObjectBehavior;

class EuLoginUserSpec extends ObjectBehavior
{
    public function it_can_get_specific_attribute()
    {
        $this
            ->getAssuranceLevel()
            ->shouldReturn('assuranceLevel');

        $this
            ->getAuthenticationFactors()
            ->shouldReturn(['foobar']);

        $this
            ->getDepartmentNumber()
            ->shouldReturn('departmentNumber');

        $this
            ->getDomain()
            ->shouldReturn('domain');

        $this
            ->getDomainUsername()
            ->shouldReturn('domainUsername');

        $this
            ->getEmail()
            ->shouldReturn('email');

        $this
            ->getEmployeeNumber()
            ->shouldReturn('employeeNumber');

        $this
            ->getEmployeeType()
            ->shouldReturn('employeeType');

        $this
            ->getFirstName()
            ->shouldReturn('firstName');

        $this
            ->getGroups()
            ->shouldReturn(['foo']);

        $this
            ->getLastName()
            ->shouldReturn('lastName');

        $this
            ->getLocale()
            ->shouldReturn('locale');

        $this
            ->getLoginDate()
            ->shouldReturn('loginDate');

        $this
            ->getOrgId()
            ->shouldReturn('orgId');

        $this
            ->getSso()
            ->shouldReturn('sso');

        $this
            ->getStrengths()
            ->shouldReturn(['bar']);

        $this
            ->getTelephoneNumber()
            ->shouldReturn('telephoneNumber');

        $this
            ->getTeleworkingPriority()
            ->shouldReturn('teleworkingPriority');

        $this
            ->getTicketType()
            ->shouldReturn('ticketType');

        $this
            ->getUid()
            ->shouldReturn('uid');
    }

    public function it_can_get_the_attributes_only()
    {
        $this
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
                    'locale' => 'locale',
                    'assuranceLevel' => 'assuranceLevel',
                    'uid' => 'uid',
                    'orgId' => 'orgId',
                    'teleworkingPriority' => 'teleworkingPriority',
                    'groups' => [
                        'foo',
                    ],
                    'strengths' => [
                        'bar',
                    ],
                    'authenticationFactors' => [
                        'foobar',
                    ],
                    'loginDate' => 'loginDate',
                    'sso' => 'sso',
                    'ticketType' => 'ticketType',
                    'proxyGrantingProtocol' => 'proxyGrantingProtocol',
                ]
            );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(EuLoginUser::class);
    }

    public function let()
    {
        $data = [
            'user' => 'user',
            'departmentNumber' => 'departmentNumber',
            'email' => 'email',
            'employeeNumber' => 'employeeNumber',
            'employeeType' => 'employeeType',
            'firstName' => 'firstName',
            'lastName' => 'lastName',
            'domain' => 'domain',
            'domainUsername' => 'domainUsername',
            'telephoneNumber' => 'telephoneNumber',
            'locale' => 'locale',
            'assuranceLevel' => 'assuranceLevel',
            'uid' => 'uid',
            'orgId' => 'orgId',
            'teleworkingPriority' => 'teleworkingPriority',
            'groups' => [
                'foo',
            ],
            'strengths' => [
                'bar',
            ],
            'authenticationFactors' => [
                'foobar',
            ],
            'loginDate' => 'loginDate',
            'sso' => 'sso',
            'ticketType' => 'ticketType',
            'proxyGrantingProtocol' => 'proxyGrantingProtocol',
            'proxyGrantingTicket' => 'proxyGrantingTicket',
            'proxies' => [
                'proxy1',
            ],
        ];

        $this
            ->beConstructedWith($data);
    }
}
