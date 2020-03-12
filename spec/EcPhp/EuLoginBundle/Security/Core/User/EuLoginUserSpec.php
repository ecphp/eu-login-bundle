<?php

declare(strict_types=1);

namespace spec\EcPhp\EuLoginBundle\Security\Core\User;

use EcPhp\CasBundle\Security\Core\User\CasUser;
use EcPhp\CasBundle\Security\Core\User\CasUserInterface;
use EcPhp\EuLoginBundle\Security\Core\User\EuLoginUser;
use PhpSpec\ObjectBehavior;

class EuLoginUserSpec extends ObjectBehavior
{
    public function it_can_get_groups_when_no_groups_are_available()
    {
        $attributes = $this->getAttributesData();
        unset($attributes['groups']);

        $data = [
            'user' => 'user',
            'proxyGrantingTicket' => 'proxyGrantingTicket',
            'proxies' => [
                'proxy1',
            ],
            'attributes' => $attributes,
        ];

        $this
            ->beConstructedWith(new CasUser($data));

        $this
            ->getGroups()
            ->shouldReturn([]);
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

    public function it_can_get_the_attributes_only(CasUserInterface $user)
    {
        $data = [
            'user' => 'user',
            'proxyGrantingTicket' => 'proxyGrantingTicket',
            'proxies' => [
                'proxy1',
            ],
            'attributes' => $this->getAttributesData(),
        ];

        $user
            ->getAttributes()
            ->willReturn($this->getAttributesData());

        $user
            ->beConstructedWith($data);
        $this
            ->beConstructedWith($user);

        $this
            ->getAttributes()
            ->shouldReturn($this->getAttributesData());
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(EuLoginUser::class);
    }

    public function let(CasUserInterface $user)
    {
        $data = [
            'user' => 'user',
            'proxyGrantingTicket' => 'proxyGrantingTicket',
            'proxies' => [
                'proxy1',
            ],
            'attributes' => $this->getAttributesData(),
        ];

        $user
            ->beConstructedWith($data);

        $user
            ->getAttribute('assuranceLevel')
            ->willReturn('assuranceLevel');

        $user
            ->getAttribute('authenticationFactors', [])
            ->willReturn([
                'foobar',
            ]);

        $user
            ->getAttribute('departmentNumber')
            ->willReturn('departmentNumber');

        $user
            ->getAttribute('domain')
            ->willReturn('domain');

        $user
            ->getAttribute('domainUsername')
            ->willReturn('domainUsername');

        $user
            ->getAttribute('email')
            ->willReturn('email');

        $user
            ->getAttribute('employeeNumber')
            ->willReturn('employeeNumber');

        $user
            ->getAttribute('employeeType')
            ->willReturn('employeeType');

        $user
            ->getAttribute('firstName')
            ->willReturn('firstName');

        $user
            ->getAttribute('groups', [])
            ->willReturn([
                'foo',
            ]);

        $user
            ->getAttribute('lastName')
            ->willReturn('lastName');

        $user
            ->getAttribute('locale')
            ->willReturn('locale');

        $user
            ->getAttribute('loginDate')
            ->willReturn('loginDate');

        $user
            ->getAttribute('orgId')
            ->willReturn('orgId');

        $user
            ->getAttribute('sso')
            ->willReturn('sso');

        $user
            ->getAttribute('strengths', [])
            ->willReturn([
                'bar',
            ]);

        $user
            ->getAttribute('telephoneNumber')
            ->willReturn('telephoneNumber');

        $user
            ->getAttribute('teleworkingPriority')
            ->willReturn('teleworkingPriority');

        $user
            ->getAttribute('ticketType')
            ->willReturn('ticketType');

        $user
            ->getAttribute('uid')
            ->willReturn('uid');

        $this
            ->beConstructedWith($user);
    }

    private function getAttributesData(): array
    {
        return [
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
        ];
    }
}
