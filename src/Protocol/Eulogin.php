<?php

declare(strict_types=1);

namespace drupol\EuloginBundle\Protocol;

use drupol\psrcas\Cas;
use drupol\psrcas\CasInterface;
use drupol\psrcas\Configuration\PropertiesInterface;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriFactoryInterface;
use Psr\Log\LoggerInterface;

/**
 * Class Eulogin.
 */
final class Eulogin implements CasInterface
{
    /**
     * @var \drupol\psrcas\Cas
     */
    private $cas;

    /**
     * @var \Psr\Http\Message\StreamFactoryInterface
     */
    private $streamFactory;

    /**
     * Eulogin constructor.
     *
     * @param \Psr\Http\Message\ServerRequestInterface $serverRequest
     * @param array $properties
     * @param \Psr\Http\Client\ClientInterface $client
     * @param \Psr\Http\Message\UriFactoryInterface $uriFactory
     * @param \Psr\Http\Message\ResponseFactoryInterface $responseFactory
     * @param \Psr\Http\Message\RequestFactoryInterface $requestFactory
     * @param \Psr\Http\Message\StreamFactoryInterface $streamFactory
     * @param \Psr\Cache\CacheItemPoolInterface $cache
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(
        ServerRequestInterface $serverRequest,
        PropertiesInterface $properties,
        ClientInterface $client,
        UriFactoryInterface $uriFactory,
        ResponseFactoryInterface $responseFactory,
        RequestFactoryInterface $requestFactory,
        StreamFactoryInterface $streamFactory,
        CacheItemPoolInterface $cache,
        LoggerInterface $logger
    ) {
        $this->cas = new Cas(
            $serverRequest,
            $properties,
            $client,
            $uriFactory,
            $responseFactory,
            $requestFactory,
            $streamFactory,
            $cache,
            $logger
        );

        $this->streamFactory = $streamFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function authenticate(): ?array
    {
        return $this->cas->authenticate();
    }

    /**
     * {@inheritdoc}
     */
    public function getProperties(): PropertiesInterface
    {
        return $this->cas->getProperties();
    }

    /**
     * {@inheritdoc}
     */
    public function getUser(ResponseInterface $response): ?array
    {
        return $this->cas->getUser($response);
    }

    /**
     * {@inheritdoc}
     */
    public function login(array $parameters = []): ?ResponseInterface
    {
        return $this->cas->login($parameters);
    }

    /**
     * {@inheritdoc}
     */
    public function logout(array $parameters = []): ResponseInterface
    {
        return $this->cas->logout($parameters);
    }

    /**
     * {@inheritdoc}
     */
    public function handleProxyCallback(
        array $parameters = [],
        ?ResponseInterface $response = null
    ): ?ResponseInterface {
        $body = '<?xml version="1.0" encoding="utf-8"?><proxySuccess xmlns="http://www.yale.edu/tp/casClient" />';

        return $this
            ->cas
            ->handleProxyCallback($parameters, $response)
            ->withBody(
                $this
                    ->streamFactory
                    ->createStream($body)
            );
    }

    /**
     * {@inheritdoc}
     */
    public function requestProxyTicket(
        array $parameters = [],
        ?ResponseInterface $response = null
    ): ?ResponseInterface {
        return $this->cas->requestProxyTicket($parameters, $response);
    }

    /**
     * {@inheritdoc}
     */
    public function requestProxyValidate(
        array $parameters = [],
        ?ResponseInterface $response = null
    ): ?ResponseInterface {
        return $this->cas->requestProxyValidate($parameters, $response);
    }

    /**
     * {@inheritdoc}
     */
    public function requestServiceValidate(
        array $parameters = [],
        ?ResponseInterface $response = null
    ): ?ResponseInterface {
        return $this->cas->requestServiceValidate($parameters, $response);
    }

    /**
     * {@inheritdoc}
     */
    public function requestTicketValidation(
        array $parameters = [],
        ?ResponseInterface $response = null
    ): ?ResponseInterface {
        return $this->cas->requestTicketValidation($parameters, $response);
    }

    /**
     * {@inheritdoc}
     */
    public function supportAuthentication(): bool
    {
        return $this->cas->supportAuthentication();
    }

    /**
     * {@inheritdoc}
     */
    public function withServerRequest(ServerRequestInterface $serverRequest): CasInterface
    {
        return $this->cas->withServerRequest($serverRequest);
    }
}
