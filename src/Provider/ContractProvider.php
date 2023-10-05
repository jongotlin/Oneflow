<?php

namespace JGI\Oneflow\Provider;

use JGI\Oneflow\Credentials;
use JGI\Oneflow\Factory\ContractFactory;
use JGI\Oneflow\Factory\CreateContractParamsFactory;
use JGI\Oneflow\Model\Contract;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * https://developer.oneflow.com/docs/contract
 */
class ContractProvider extends BaseProvider implements ProviderInterface
{
    private string $route = 'contracts';
    private ContractFactory $contractFactory;

    public function __construct(HttpClientInterface $client, Credentials $credentials)
    {
        parent::__construct($client, $credentials);

        $this->contractFactory = new ContractFactory();
    }

    /**
     * @return array<int, Contract>
     */
    public function index(): array
    {
        $factory = new ContractFactory();
        $data = $this->get($this->route);

        $contracts = [];
        foreach ($data['data'] as $row) {
            $contracts[] = $factory->create($row);
        }

        return $contracts;
    }

    public function find(string $id): ?Contract
    {
        $data = $this->get($this->route . '/' . $id);

        return ! isset($data['error_code']) ? $this->contractFactory->create($data) : null;
    }


    public function create(Contract $contract): Contract
    {
        $params = (new CreateContractParamsFactory())->create($contract);
        $data = $this->post($this->route . '/create', $params);

        return $this->contractFactory->create($data);
    }

    public function attachPdf(string $contractId, \SplFileInfo $file): void
    {
        $route = sprintf('%s/%s/files', $this->route, $contractId);
        $this->postFile($route, $file);
    }

    public function publish(string $contractId, string $subject, string $message): void
    {
        $data = [
            'subject' => $subject,
            'message' => $message,
        ];

        $route = sprintf('%s/%s/publish', $this->route, $contractId);
        $this->post($route, $data);
    }

    public function delete(string $contractId): void
    {
        $this->deleteRequest(sprintf('%s/%s', $this->route, $contractId));
    }

    /**
     * https://developer.oneflow.com/reference/create-an-access-link
     */
    public function accessLink(string $contractId, string $participantId): string
    {
        $data = $this->post($this->route . '/' . $contractId . '/participants/' . $participantId . '/access_link', []);

        return $data['access_link'];
    }
}
