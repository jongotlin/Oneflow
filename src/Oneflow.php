<?php

namespace JGI\Oneflow;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use JGI\Oneflow\Provider\AgreementProvider;
use JGI\Oneflow\Provider\CollectionProvider;
use JGI\Oneflow\Provider\PingProvider;
use JGI\Oneflow\Provider\PositionProvider;
use JGI\Oneflow\Provider\TemplateProvider;

class Oneflow
{
    const API_URL = 'https://app.oneflow.com/api/';

    /**
     * @var Client
     */
    private $client;

    /**
     * @var Credentials|null
     */
    private $credentials;

    /**
     * @param Client $client
     * @param Credentials|null $credentials
     * @param bool $testEnvironment
     */
    public function __construct(Client $client, Credentials $credentials = null)
    {
        $this->client = $client;
        $this->credentials = $credentials;
    }

    public function setClient(Client $client): void
    {
        $this->client = $client;
    }

    /**
     * @param Credentials $credentials
     */
    public function setCredentials(Credentials $credentials): void
    {
        $this->credentials = $credentials;
    }

    /**
     * @return Credentials|null
     */
    public function getCredentials(): ?Credentials
    {
        return $this->credentials;
    }

    /**
     * @return CollectionProvider
     */
    public function collections(): CollectionProvider
    {
        return new CollectionProvider($this->client, $this->credentials);
    }
    
    /**
     * @return AgreementProvider
     */
    public function agreements(): AgreementProvider
    {
        return new AgreementProvider($this->client, $this->credentials);
    }
    
    /**
     * @return PositionProvider
     */
    public function positions(): PositionProvider
    {
        return new PositionProvider($this->client, $this->credentials);
    }

    /**
     * @return TemplateProvider
     */
    public function templates(): TemplateProvider
    {
        return new TemplateProvider($this->client, $this->credentials);
    }

    /**
     * @return PingProvider
     */
    public function ping(): PingProvider
    {
        return new PingProvider($this->client, $this->credentials);
    }
}
