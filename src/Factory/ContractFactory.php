<?php

namespace JGI\Oneflow\Factory;

use JGI\Oneflow\Model\Contract;
use JGI\Oneflow\Model\Participant;
use JGI\Oneflow\Model\Party;

class ContractFactory
{
    /**
     * @param array $data
     *
     * @return Contract
     */
    public function create(array $data): Contract
    {
        $contract = new Contract();
        $contract->setId($data['id']);

        foreach ($data['parties'] as $partyData) {
            $party = new Party();
            $party->setName($partyData['name']);
            $party->setIsMyParty($partyData['my_party'] == 1);
            $party->setIdentificationNumber($partyData['identification_number']);
            $party->setCountryCode($partyData['country_code']);

            if (isset($partyData['participants'])) {
                $participants = $this->createParticipants($partyData['participants']);
                $party->setParticipants($participants);
            }

            $contract->addParty($party);
        }

        return $contract;
    }

    private function createParticipants($data): array
    {
        $result = [];
        foreach ($data as $dataItem) {
            $participant = new Participant();
            $participant->setId($dataItem['id']);
            $participant->setName($dataItem['name']);
            $participant->setEmail($dataItem['email']);
            $participant->setTitle($dataItem['title']);
            $result[] = $participant;
        }

        return $result;
    }
}