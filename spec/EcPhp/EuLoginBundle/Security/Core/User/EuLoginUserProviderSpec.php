<?php

declare(strict_types=1);

namespace spec\EcPhp\EuLoginBundle\Security\Core\User;

use EcPhp\EuLoginBundle\Security\Core\User\EuLoginUser;
use EcPhp\EuLoginBundle\Security\Core\User\EuLoginUserInterface;
use EcPhp\EuLoginBundle\Security\Core\User\EuLoginUserProvider;
use PhpSpec\ObjectBehavior;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\User;

class EuLoginUserProviderSpec extends ObjectBehavior
{
    public function it_can_check_if_the_user_class_is_supported()
    {
        $this
            ->supportsClass(EuLoginUser::class)
            ->shouldReturn(true);

        $this
            ->supportsClass(User::class)
            ->shouldReturn(false);
    }

    public function it_can_load_a_user_from_a_response(ResponseInterface $response)
    {
        $response
            ->getStatusCode()
            ->willReturn(200);

        $response
            ->hasHeader('Content-Type')
            ->willReturn(true);

        $response
            ->getHeaderLine('Content-Type')
            ->willReturn('application/xml');

        $body = <<<'EOF'
<cas:serviceResponse xmlns:cas="http://www.yale.edu/tp/cas">
 <cas:authenticationSuccess>
  <cas:user>username</cas:user>
  <cas:foo>bar</cas:foo>
  <cas:proxies>
    <cas:proxy>foo</cas:proxy>
  </cas:proxies>
  <cas:groups>
    <cas:group>group1</cas:group>
    <cas:group>group2</cas:group>
  </cas:groups>
 </cas:authenticationSuccess>
</cas:serviceResponse>
EOF;

        $response
            ->getBody()
            ->willReturn($body);

        $this
            ->loadUserByResponse($response)
            ->shouldReturnAnInstanceOf(EuLoginUser::class);

        $this
            ->loadUserByResponse($response)
            ->getAttributes()
            ->shouldEqual([
                'foo' => 'bar',
                'groups' => [
                    'group' => [
                        'group1',
                        'group2',
                    ],
                ],
            ]);

        $this
            ->loadUserByResponse($response)
            ->getUser()
            ->shouldReturn('username');

        $this
            ->loadUserByResponse($response)
            ->getRoles()
            ->shouldReturn([
                'group1',
                'group2',
                'ROLE_CAS_AUTHENTICATED',
            ]);
    }

    public function it_can_refresh_a_user(EuLoginUserInterface $user)
    {
        $this
            ->shouldThrow(UnsupportedUserException::class)
            ->during('refreshUser', [new User('foo', 'bar')]);

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
}
