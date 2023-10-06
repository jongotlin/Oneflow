<?php

namespace JGI\Oneflow;

use JGI\Oneflow\Provider\AccountProvider;
use JGI\Oneflow\Provider\ContractProvider;
use JGI\Oneflow\Provider\PingProvider;
use JGI\Oneflow\Provider\TemplateProvider;
use JGI\Oneflow\Provider\UserProvider;
use JGI\Oneflow\Provider\WorkspaceProvider;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class Oneflow
{
    public const API_URL = 'https://api.oneflow.com/v1/';

    public function __construct(
        private HttpClientInterface $client,
        private Credentials $credentials
    ) {
    }

    public function setClient(HttpClientInterface $client): void
    {
        $this->client = $client;
    }

    public function setCredentials(Credentials $credentials): void
    {
        $this->credentials = $credentials;
    }

    public function getCredentials(): ?Credentials
    {
        return $this->credentials;
    }

    public function account(): AccountProvider
    {
        return new AccountProvider($this->client, $this->credentials);
    }

    public function users(): UserProvider
    {
        return new UserProvider($this->client, $this->credentials);
    }

    public function workspaces(): WorkspaceProvider
    {
        return new WorkspaceProvider($this->client, $this->credentials);
    }

    public function contracts(): ContractProvider
    {
        return new ContractProvider($this->client, $this->credentials);
    }

    public function templates(): TemplateProvider
    {
        return new TemplateProvider($this->client, $this->credentials);
    }

    public function ping(): PingProvider
    {
        return new PingProvider($this->client, $this->credentials);
    }
}
