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
                  <cas:groups number="0"/>
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
            ->shouldReturn([
                'moniker' => [
                    '@value' => 'ecphp@ec.europa.eu',
                    '@attributes' => [
                        'number' => '1',
                    ],
                ],
            ]);

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
            ->shouldReturn(['strength1']);

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

        $this
            ->getUserManager()
            ->shouldReturn('userManager');

        $this
            ->getTimeZone()
            ->shouldReturn('timeZone');

        $this
            ->getProxyGrantingProtocol()
            ->shouldReturn('proxyGrantingProtocol');
    }

    public function it_can_get_the_attributes_only()
    {
        $this
            ->getAttributes()
            ->shouldReturn($this->getAttributesData());
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(EuLoginUser::class);

        $this
            ->getPassword()
            ->shouldBeNull();

        $this
            ->getPgt()
            ->shouldReturn('proxyGrantingTicket');

        $this
            ->getSalt()
            ->shouldBeNull();

        $this
            ->getUserIdentifier()
            ->shouldReturn('username');

        $this
            ->get('foo', 'bar')
            ->shouldReturn('bar');

        $this
            ->eraseCredentials()
            ->shouldBeNull();
    }

    public function let()
    {
        $body = <<<'EOF'
            <cas:serviceResponse xmlns:cas="http://www.yale.edu/tp/cas">
             <cas:authenticationSuccess>
              <cas:user>username</cas:user>
              <cas:foo>bar</cas:foo>
              <cas:proxies>
                <cas:proxy>foo</cas:proxy>
              </cas:proxies>
              <cas:proxyGrantingTicket>
                proxyGrantingTicket
              </cas:proxyGrantingTicket>
              <cas:attributes>
                  <cas:departmentNumber>
                      departmentNumber
                  </cas:departmentNumber>
                  <cas:domain>
                      domain
                  </cas:domain>
                  <cas:domainUsername>
                      domainUsername
                  </cas:domainUsername>
                  <cas:email>
                      email
                  </cas:email>
                  <cas:employeeNumber>
                      employeeNumber
                  </cas:employeeNumber>
                  <cas:employeeType>
                      employeeType
                  </cas:employeeType>
                  <cas:firstName>
                      firstName
                  </cas:firstName>
                  <cas:lastName>
                      lastName
                  </cas:lastName>
                  <cas:locale>
                      locale
                  </cas:locale>
                  <cas:loginDate>
                      loginDate
                  </cas:loginDate>
                  <cas:orgId>
                      orgId
                  </cas:orgId>
                  <cas:sso>
                    sso
                  </cas:sso>
                  <cas:strengths number="1">
                    <cas:strength>strength1</cas:strength>
                  </cas:strengths>
                  <cas:telephoneNumber>
                      telephoneNumber
                  </cas:telephoneNumber>
                  <cas:teleworkingPriority>
                      teleworkingPriority
                  </cas:teleworkingPriority>
                  <cas:ticketType>
                      ticketType
                  </cas:ticketType>
                  <cas:uid>
                      uid
                  </cas:uid>
                  <cas:authenticationFactors>
                    <cas:moniker number="1">
                        ecphp@ec.europa.eu
                    </cas:moniker>
                  </cas:authenticationFactors>
                  <cas:assuranceLevel>40</cas:assuranceLevel>
                  <cas:proxyGrantingProtocol>
                    proxyGrantingProtocol
                  </cas:proxyGrantingProtocol>
                  <cas:userManager>
                      userManager
                  </cas:userManager>
                  <cas:timeZone>
                      timeZone
                  </cas:timeZone>
                  <cas:groups number="2">
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

        $this->beConstructedWith(new CasUser($data));
    }

    private function getAttributesData(): array
    {
        return [
            'departmentNumber' => 'departmentNumber',
            'domain' => 'domain',
            'domainUsername' => 'domainUsername',
            'email' => 'email',
            'employeeNumber' => 'employeeNumber',
            'employeeType' => 'employeeType',
            'firstName' => 'firstName',
            'lastName' => 'lastName',
            'locale' => 'locale',
            'loginDate' => 'loginDate',
            'orgId' => 'orgId',
            'sso' => 'sso',
            'strengths' => [
                'strength' => [
                    'strength1',
                ],
                '@attributes' => [
                    'number' => '1',
                ],
            ],
            'telephoneNumber' => 'telephoneNumber',
            'teleworkingPriority' => 'teleworkingPriority',
            'ticketType' => 'ticketType',
            'uid' => 'uid',
            'authenticationFactors' => [
                'moniker' => [
                    '@value' => 'ecphp@ec.europa.eu',
                    '@attributes' => [
                        'number' => '1',
                    ],
                ],
            ],
            'assuranceLevel' => '40',
            'proxyGrantingProtocol' => 'proxyGrantingProcotol',
            'userManager' => 'userManager',
            'timeZone' => 'timeZone',
            'firstName' => 'firstName',
            'lastName' => 'lastName',
            'domain' => 'domain',
            'domainUsername' => 'domainUsername',
            'telephoneNumber' => 'telephoneNumber',
            'locale' => 'locale',
            'uid' => 'uid',
            'orgId' => 'orgId',
            'teleworkingPriority' => 'teleworkingPriority',
            'groups' => [
                'group' => [
                    'group1',
                    'group2',
                ],
                '@attributes' => [
                    'number' => '2',
                ],
            ],
            'extendedAttributes' => [
                'extendedAttribute' => [
                    [
                        'attributeValue' => [
                            'rex',
                            'snoopy',
                        ],
                        '@attributes' => [
                            'name' => 'http://stork.eu/motherInLawDogName',
                        ],
                    ],
                ],
            ],
            'sso' => 'sso',
            'ticketType' => 'ticketType',
            'assuranceLevel' => '40',
            'proxyGrantingProtocol' => 'proxyGrantingProtocol',
            'timeZone' => 'timeZone',
            'userManager' => 'userManager',
        ];
    }
}
