<?php

namespace JGI\Oneflow;

use GuzzleHttp\Client;
use JGI\Oneflow\Provider\AccountProvider;
use JGI\Oneflow\Provider\ContractProvider;
use JGI\Oneflow\Provider\PingProvider;
use JGI\Oneflow\Provider\TemplateProvider;
use JGI\Oneflow\Provider\UserProvider;
use JGI\Oneflow\Provider\WorkspaceProvider;

class Oneflow
{
    const API_URL = 'https://api.oneflow.com/v1/';

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
     * @return AccountProvider
     */
    public function account(): AccountProvider
    {
        return new AccountProvider($this->client, $this->credentials);
    }

    /**
     * @return UserProvider
     */
    public function users(): UserProvider
    {
        return new UserProvider($this->client, $this->credentials);
    }

    /**
     * @return WorkspaceProvider
     */
    public function workspaces(): WorkspaceProvider
    {
        return new WorkspaceProvider($this->client, $this->credentials);
    }

    /**
     * @return ContractProvider
     */
    public function contracts(): ContractProvider
    {
        return new ContractProvider($this->client, $this->credentials);
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
