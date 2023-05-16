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
use EcPhp\CasLib\Response\CasResponseBuilder;
use EcPhp\Ecas\Response\EcasResponseBuilder;
use EcPhp\EuLoginBundle\Security\Core\User\EuLoginUser;
use Nyholm\Psr7\Response as Psr7Response;
use PhpSpec\ObjectBehavior;

class EuLoginUserSpec extends ObjectBehavior
{
    public function it_can_get_groups_when_no_groups_are_available()
    {
        $casUser = new CasUser($this->getResponseBody()['serviceResponse']['authenticationSuccess']);

        $this
            ->beConstructedWith($casUser);

        $this
            ->getGroups()
            ->shouldReturn(['A', 'B', 'C']);
        $this
            ->getUserIdentifier()
            ->shouldReturn('user');
    }

    public function it_can_get_specific_attribute()
    {
        $this
            ->getPayload()
            ->shouldReturn($this->getResponseBody()['serviceResponse']['authenticationSuccess']);

        $this
            ->getAssuranceLevel()
            ->shouldReturn('assuranceLevel');

        $this
            ->getAuthenticationFactors()
            ->shouldReturn([
                'moniker' => 'moniker',
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
                'A',
                'B',
                'C',
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
            ->shouldReturn(true);

        $this
            ->getStrengths()
            ->shouldReturn(['A', 'B']);

        $this
            ->getTelephoneNumber()
            ->shouldReturn('telephoneNumber');

        $this
            ->getTeleworkingPriority()
            ->shouldReturn(false);

        $this
            ->getTicketType()
            ->shouldReturn('ticketType');

        $this
            ->getUid()
            ->shouldReturn('uid');

        $this
            ->getUserManager()
            ->shouldReturn(null);

        $this
            ->getTimeZone()
            ->shouldReturn(null);

        $this
            ->getProxyGrantingProtocol()
            ->shouldReturn(null);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(EuLoginUser::class);

        $this
            ->getPgt()
            ->shouldReturn('proxyGrantingTicket');

        $this
            ->getUserIdentifier()
            ->shouldReturn('user');

        $this
            ->get('foo', 'bar')
            ->shouldReturn('bar');

        $this
            ->eraseCredentials()
            ->shouldReturn(null);
    }

    public function let()
    {
        $response = new Psr7Response(200, ['Content-Type' => 'application/json'], $this->makePayload());

        $ecasResponseBuilder = new EcasResponseBuilder(new CasResponseBuilder());

        $responseArray = $ecasResponseBuilder->fromResponse($response)->toArray();

        $this->beConstructedWith(new CasUser($responseArray['serviceResponse']['authenticationSuccess']));
    }

    private function getResponseBody(): array
    {
        return json_decode($this->makePayload(), true);
    }

    private function makePayload(): string
    {
        return '{
            "serviceResponse":{
                "server":"EU Login",
                "date":"2023-05-16T14:01:39.152+02:00",
                "version":"8.3",
                "authenticationSuccess":{
                    "proxyGrantingTicket":"proxyGrantingTicket",
                    "user":"user",
                    "departmentNumber":"departmentNumber",
                    "email":"email",
                    "employeeNumber":"employeeNumber",
                    "employeeType":"employeeType",
                    "firstName":"firstName",
                    "lastName":"lastName",
                    "domain":"domain",
                    "domainUsername":"domainUsername",
                    "telephoneNumber":"telephoneNumber",
                    "locale":"locale",
                    "assuranceLevel":"assuranceLevel",
                    "uid":"uid",
                    "orgId":"orgId",
                    "teleworkingPriority":false,
                    "groups":[
                        "A",
                        "B",
                        "C"
                    ],
                    "authenticationLevel":"authenticationLevel",
                    "strengths":[
                        "A",
                        "B"
                    ],
                    "authenticationFactors":{
                        "moniker":"moniker"
                    },
                    "loginDate":"loginDate",
                    "sso":true,
                    "ticketType":"ticketType"
                }
            }
        }';
    }
}
