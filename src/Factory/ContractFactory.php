<?php

namespace JGI\Oneflow\Factory;

use JGI\Oneflow\Model\Contract;
use JGI\Oneflow\Model\Participant;
use JGI\Oneflow\Model\Party;

class ContractFactory
{
    public function create(array $data): Contract
    {
        $contract = new Contract();
        $contract->setId($data['id']);

        foreach ($data['parties'] as $partyData) {
            $party = new Party();
            $party->setName($partyData['name']);
            $party->setIsMyParty(1 == $partyData['my_party']);
            $party->setIdentificationNumber($partyData['identification_number']);
            $party->setCountryCode($partyData['country_code']);

            $participantsData = $this->getParticipantsData($partyData);
            if ($participantsData) {
                $participants = $this->createParticipants($participantsData);
                $party->setParticipants($participants);
            }

            $contract->addParty($party);
        }

        return $contract;
    }

    private function getParticipantsData($data): array
    {
        if (isset($data['participants'])) {
            return $data['participants'];
        }

        if (isset($data['participant'])) {
            return [$data['participant']];
        }

        return [];
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
