<?php

namespace JGI\Oneflow\Provider;

use GuzzleHttp\Client;
use JGI\Oneflow\Credentials;
use JGI\Oneflow\Factory\ContractFactory;
use JGI\Oneflow\Model\Contract;

class ContractProvider extends BaseProvider implements ProviderInterface
{
    /** @var string  */
    private $route = 'contracts';

    /** @var ContractFactory */
    private $contractFactory;

    public function __construct(Client $client, Credentials $credentials)
    {
        parent::__construct($client, $credentials);

        $this->contractFactory = new ContractFactory();
    }

    /**
     * @return Contract[]
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

    /**
     * @param string $id
     *
     * @return Contract|null
     */
    public function find(string $id): ?Contract
    {
        $data = $this->get($this->route . '/' . $id);

        return ! isset($data['error_code']) ? $this->contractFactory->create($data) : null;
    }

    /**
     * @param Contract $contract
     *
     * @return Contract
     */
    public function create(Contract $contract): Contract
    {
        $parties = [];
        foreach ($contract->getParties() as $party) {
            $participants = [];
            foreach ($party->getParticipants() as $participant) {
                $participants[] = [
                    'name' => $participant->getName(),
                    'title' => $participant->getTitle(),
                    'email' => $participant->getEmail(),
                    'delivery_channel' => $participant->getDeliveryChannel(),
                ];
            }
            $parties[] = [
                'name' => $party->getName(),
                'identification_number' => $party->getIdentificationNumber(),
                'country_code' => $party->getCountryCode(),
                'type' => $party->getType(),
                'participants' => $participants,
            ];
        }

        $array = [
            'workspace_id' => $contract->getWorkspace()->getId(),
            'template_id' => $contract->getTemplate()->getId(),
            'parties' => $parties,
        ];

        $data = $this->post($this->route . '/create', $array);

        return $this->contractFactory->create($data);
    }

    /**
     * @param string $contractId
     * @param \SplFileInfo $file
     */
    public function attachPdf(string $contractId, \SplFileInfo $file): void
    {
        $route = sprintf('%s/%s/files', $this->route, $contractId);
        $this->postFile($route, $file);
    }

    /**
     * @param string $contractId
     * @param string $subject
     * @param string $message
     */
    public function publish(string $contractId, string $subject, string $message): void
    {
        $data = [
            'subject' => $subject,
            'message' => $message,
        ];

        $route = sprintf('%s/%s/publish', $this->route, $contractId);
        $this->post($route, $data);
    }


    /**
     * @param string $contractId
     */
    public function delete(string $contractId): void
    {
        $this->deleteRequest(sprintf('%s/%s', $this->route, $contractId));
    }
}
