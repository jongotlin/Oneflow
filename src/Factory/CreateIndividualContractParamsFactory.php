<?php

namespace JGI\Oneflow\Factory;

use JGI\Oneflow\Model\Contract;

class CreateIndividualContractParamsFactory
{
    /**
     * @param Contract $contract
     * @return array
     */
    public function create(Contract $contract): array
    {
        $result = [
            'workspace_id' => $contract->getWorkspace()->getId(),
            'template_id' => $contract->getTemplate()->getId(),
        ];

        $party = $contract->getParties()[0];
        $participant = $party->getParticipants()[0];

        $result['parties'] = [
            [
                'country_code' => $party->getCountryCode(),
                'type' => $party->getType(),
                'participant' => [
                    '_permissions' => [
                        'contract:update' => true
                    ],
                    'name' => $participant->getName(),
                    'title' => $participant->getTitle(),
                    'email' => $participant->getEmail(),
                    'delivery_channel' => $participant->getDeliveryChannel(),
                    'signatory' => true,
                    'sign_method' => 'standard_esign',
                ],
            ]
        ];

        return $result;
    }
}