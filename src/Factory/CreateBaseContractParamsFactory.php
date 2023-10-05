<?php

namespace JGI\Oneflow\Factory;

use JGI\Oneflow\Model\Contract;

class CreateBaseContractParamsFactory
{
    public function create(Contract $contract): array
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

        return [
            'workspace_id' => $contract->getWorkspace()->getId(),
            'template_id' => $contract->getTemplate()->getId(),
            'parties' => $parties,
        ];
    }
}