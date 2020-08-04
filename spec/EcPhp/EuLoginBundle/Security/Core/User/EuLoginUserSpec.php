<?php

declare(strict_types=1);

namespace spec\EcPhp\EuLoginBundle\Security\Core\User;

use EcPhp\CasBundle\Security\Core\User\CasUser;
use EcPhp\CasBundle\Security\Core\User\CasUserInterface;
use EcPhp\CasLib\Introspection\Introspector;
use EcPhp\EuLoginBundle\Security\Core\User\EuLoginUser;
use Nyholm\Psr7\Response;
use PhpSpec\ObjectBehavior;

class EuLoginUserSpec extends ObjectBehavior
{
    public function it_can_get_groups_when_no_groups_are_available()
    {
        $body = <<<'EOF'
<cas:serviceResponse xmlns:cas="http://www.yale.edu/tp/cas">
 <cas:authenticationSuccess>
  <cas:user>username</cas:user>
  <cas:foo>bar</cas:foo>
  <cas:proxies>
    <cas:proxy>foo</cas:proxy>
  </cas:proxies>
  <cas:attributes>
      <cas:groups number="10">
        <cas:group>group1</cas:group>
        <cas:group>group2</cas:group>
      </cas:groups>
      <cas:extendedAttributes>
        <cas:extendedAttribute name="http://stork.eu/motherInLawDogName">
            <cas:attributeValue>rex</cas:attributeValue>
            <cas:attributeValue>snoopy</cas:attributeValue>
        </cas:extendedAttribute>
      </cas:extendedAttributes>
  </cas:attributes>
 </cas:authenticationSuccess>
</cas:serviceResponse>
EOF;

        $response = new Response(200, ['Content-Type' => 'application/xml'], $body);
        $data = (new Introspector())->parse($response)['serviceResponse']['authenticationSuccess'];
        unset($data['attributes']['groups']);

        $casUser = new CasUser($data);

        $this
            ->beConstructedWith($casUser);

        $this
            ->getGroups()
            ->shouldReturn([]);
    }

    public function it_can_get_specific_attribute()
    {
        $this
            ->getAssuranceLevel()
            ->shouldReturn('40');

        $this
            ->getAuthenticationFactors()
            ->shouldReturn(['ecphp@ec.europa.eu']);

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
            ->shouldReturn([
                'group1',
                'group2',
            ]);

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

        $this
            ->getAttributes()
            ->shouldReturn($this->getAttributesData());
    }

    public function it_can_get_the_attributes_only(CasUserInterface $user)
    {
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
        $body = <<<'EOF'
<cas:serviceResponse xmlns:cas="http://www.yale.edu/tp/cas">
 <cas:authenticationSuccess>
  <cas:user>username</cas:user>
  <cas:foo>bar</cas:foo>
  <cas:proxies>
    <cas:proxy>foo</cas:proxy>
  </cas:proxies>
  <cas:attributes>
      <cas:authenticationFactors>
        <cas:moniker number="1">
            ecphp@ec.europa.eu
        </cas:moniker>
      </cas:authenticationFactors>
      <cas:assuranceLevel>40</cas:assuranceLevel>
      <cas:groups number="10">
        <cas:group>group1</cas:group>
        <cas:group>group2</cas:group>
      </cas:groups>
      <cas:extendedAttributes>
        <cas:extendedAttribute name="http://stork.eu/motherInLawDogName">
            <cas:attributeValue>rex</cas:attributeValue>
            <cas:attributeValue>snoopy</cas:attributeValue>
        </cas:extendedAttribute>
      </cas:extendedAttributes>
  </cas:attributes>
 </cas:authenticationSuccess>
</cas:serviceResponse>
EOF;

        $response = new Response(200, ['Content-Type' => 'application/json'], $body);
        $data = (new Introspector())->parse($response)['serviceResponse']['authenticationSuccess'];

        $user
            ->beConstructedWith($data);

        $user
            ->getAttribute('extendedAttributes', [])
            ->willReturn([
                'extendedAttribute' => [
                    'attributeValue' => [
                        'value1',
                        'value2',
                    ],
                    '@attributes' => [
                        'name' => 'attr1',
                    ],
                ],
            ]);

        $user
            ->getAttribute('assuranceLevel')
            ->willReturn($data['attributes']['assuranceLevel']);

        $user
            ->getAttribute('authenticationFactors', [])
            ->willReturn([
                'ecphp@ec.europa.eu',
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
            ->getAttribute('groups', ['group' => []])
            ->willReturn([
                'group' => [
                    'group1',
                    'group2',
                ],
                '@attributes' => [
                    'number' => 2,
                ],
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

        $user
            ->getAttributes()
            ->willReturn($this->getAttributesData());

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
            'extendedAttributes' => [
                'attr1' => [
                    'value1',
                    'value2',
                ],
            ],
            'firstName' => 'firstName',
            'lastName' => 'lastName',
            'domain' => 'domain',
            'domainUsername' => 'domainUsername',
            'telephoneNumber' => 'telephoneNumber',
            'locale' => 'locale',
            'assuranceLevel' => '40',
            'uid' => 'uid',
            'orgId' => 'orgId',
            'teleworkingPriority' => 'teleworkingPriority',
            'groups' => [
                'group1',
                'group2',
            ],
            'strengths' => [
                'bar',
            ],
            'authenticationFactors' => [
                'ecphp@ec.europa.eu',
            ],
            'loginDate' => 'loginDate',
            'sso' => 'sso',
            'ticketType' => 'ticketType',
            'proxyGrantingProtocol' => 'proxyGrantingProtocol',
        ];
    }
}
