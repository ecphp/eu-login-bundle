<?php

declare(strict_types=1);

namespace spec\drupol\EuloginBundle\Security\Core\User;

use PhpSpec\ObjectBehavior;
use drupol\EuloginBundle\Security\Core\User\EuloginUser;

class EuloginUserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(EuloginUser::class);
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

    function let()
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
                'foo'
            ],
            'strengths' => [
                'bar'
            ],
            'authenticationFactors' => [
                'foobar'
            ],
            'loginDate' => 'loginDate',
            'sso' => 'sso',
            'ticketType' => 'ticketType',
            'proxyGrantingProtocol' => 'proxyGrantingProtocol',
            'proxyGrantingTicket' => 'proxyGrantingTicket',
            'proxies' => [
                'proxy1'
            ]
        ];

        $this
            ->beConstructedWith($data);
    }
}
