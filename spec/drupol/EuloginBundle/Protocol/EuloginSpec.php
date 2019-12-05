<?php

declare(strict_types=1);

namespace spec\drupol\EuloginBundle\Protocol;

use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7\ServerRequest;
use Nyholm\Psr7Server\ServerRequestCreator;
use PhpSpec\ObjectBehavior;
use Psr\Cache\CacheItemInterface;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpClient\Psr18Client;

class EuloginSpec extends ObjectBehavior
{
    public function it_is_returning_xml_on_the_proxycallback()
    {
        $request = new ServerRequest('GET', 'http://local/proxycallback?pgtId=pgtId&pgtIou=pgtIou');

        $this
            ->withServerRequest($request)
            ->handleProxyCallback()
            ->shouldReturnAnInstanceOf(ResponseInterface::class);

        $this
            ->withServerRequest($request)
            ->handleProxyCallback()
            ->getBody()
            ->__toString()
            ->shouldReturn('<?xml version="1.0" encoding="utf-8"?><proxySuccess xmlns="http://www.yale.edu/tp/casClient" />');

        $this
            ->withServerRequest($request)
            ->handleProxyCallback()
            ->getStatusCode()
            ->shouldReturn(200);

        $request = new ServerRequest('GET', 'http://local/proxycallback?pgtId=pgtId');

        $this
            ->withServerRequest($request)
            ->handleProxyCallback()
            ->getStatusCode()
            ->shouldReturn(500);

        $request = new ServerRequest('GET', 'http://local/proxycallback?pgtIou=pgtIou');

        $this
            ->withServerRequest($request)
            ->handleProxyCallback()
            ->getStatusCode()
            ->shouldReturn(500);
    }

    public function let(LoggerInterface $logger, CacheItemPoolInterface $cache, CacheItemInterface $cacheItemPgtIou, CacheItemInterface $cacheItemPgtIdNull)
    {
        $properties = CasHelper::getTestProperties();
        $client = new Psr18Client(CasHelper::getHttpClientMock());

        $psr17Factory = new Psr17Factory();
        $creator = new ServerRequestCreator(
            $psr17Factory, // ServerRequestFactory
            $psr17Factory, // UriFactory
            $psr17Factory, // UploadedFileFactory
            $psr17Factory  // StreamFactory
        );
        $serverRequest = $creator->fromGlobals();

        $cacheItemPgtIou
            ->set('pgtId')
            ->willReturn($cacheItemPgtIou);

        $cacheItemPgtIou
            ->expiresAfter(300)
            ->willReturn($cacheItemPgtIou);

        $cacheItemPgtIou
            ->get()
            ->willReturn('pgtIou');

        $cache
            ->hasItem('unknownPgtIou')
            ->willReturn(false);

        $cache
            ->save($cacheItemPgtIou)
            ->willReturn(true);

        $cache
            ->hasItem('pgtIou')
            ->willReturn(false);

        $cache
            ->getItem('pgtIou')
            ->willReturn($cacheItemPgtIou);

        $cache
            ->hasItem('pgtIouWithPgtIdNull')
            ->willReturn(true);

        $cacheItemPgtIdNull
            ->set(null)
            ->willReturn($cacheItemPgtIdNull);

        $cacheItemPgtIdNull
            ->expiresAfter(300)
            ->willReturn($cacheItemPgtIdNull);

        $cacheItemPgtIdNull
            ->get()
            ->willReturn(null);

        $cache
            ->getItem('pgtIouWithPgtIdNull')
            ->willReturn($cacheItemPgtIdNull);

        $this
            ->beConstructedWith($serverRequest, $properties, $client, $psr17Factory, $psr17Factory, $psr17Factory, $psr17Factory, $cache, $logger);
    }
}
