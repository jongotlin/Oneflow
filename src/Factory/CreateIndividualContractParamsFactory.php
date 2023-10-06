<?php

namespace JGI\Oneflow\Factory;

use JGI\Oneflow\Model\Contract;

class CreateIndividualContractParamsFactory
{
    public function create(Contract $contract): array
    {
        $result = [
            'workspace_id' => $contract->getWorkspace()?->getId(),
            'template_id' => $contract->getTemplate()?->getId(),
        ];

        $party = $contract->getParties()[0];
        $participant = $party->getParticipants()[0];

        $result['parties'] = [
            [
                'country_code' => $party->getCountryCode(),
                'type' => $party->getType(),
                'participant' => [
                    '_permissions' => [
                        'contract:update' => true,
                    ],
                    'name' => $participant->getName(),
                    'title' => $participant->getTitle(),
                    'email' => $participant->getEmail(),
                    'delivery_channel' => $participant->getDeliveryChannel(),
                    'signatory' => $participant->isSignatory(),
                    'sign_method' => $participant->getSignMethod(),
                    'identification_number' => $participant->getIdentificationNumber(),
                ],
            ],
        ];

        if (null !== $party = $contract->getMyParty()) {
            $myParty = [
                'name' => $party->getName(),
                'country_code' => $party->getCountryCode(),
                'participants' => [],
            ];
            foreach ($party->getParticipants() as $participant) {
                $myParty['participants'][] = [
                    '_permissions' => [
                        'contract:update' => true,
                    ],
                    'organizer' => true,
                    'name' => $participant->getName(),
                    'email' => $participant->getEmail(),
                    'signatory' => $participant->isSignatory(),
                ];
            }
            $result['my_party'] = $myParty;
        }

        return $result;
    }
}
