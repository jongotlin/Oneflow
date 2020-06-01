<?php

namespace JGI\Oneflow\Provider;

use JGI\Oneflow\Model\Agreement;
use JGI\Oneflow\Model\Collection;
use JGI\Oneflow\Model\Participant;
use JGI\Oneflow\Model\Party;

class AgreementProvider extends BaseProvider implements ProviderInterface
{
    /**
     * @return Agreement[]
     */
    public function all()
    {
        $data = $this->get('agreements/', $this->credentials->getPosition());

        $agreements = [];
        foreach ($data['collection'] as $agreementData) {
            $agreements[] = $this->createAgreementObject($agreementData);
        }

        return $agreements;
    }

    /**
     * @param string $id
     *
     * @return Agreement|null
     */
    public function find(string $id): ?Agreement
    {
        $data = $this->get('agreements/' . $id, $this->credentials->getPosition());

        return $this->createAgreementObject($data);
    }

    /**
     * @param array $data
     *
     * @return Agreement
     */
    private function createAgreementObject(array $data): Agreement
    {
        $agreement = new Agreement();
        $agreement->setId($data['id']);
        $agreement->setName($data['name']);
        foreach ($data['parties'] as $partyData) {
            $party = new Party();
            $party->setName($partyData['name']);
            $party->setConsumer($partyData['consumer'] == 1);
            $party->setOrgnr($partyData['orgnr']);
            $party->setCountry($partyData['country']);

            foreach ($partyData['participants'] as $participantData) {
                $participant = new Participant();
                $participant->setId($participantData['id']);
                $participant->setName($participantData['fullname']);
                if ($participantData['position']) {
                    $participant->setPositionId($participantData['position']['id']);
                }
                $participant->setEmail($participantData['email']);
                $participant->setTitle($participantData['title']);
                $party->addParticipant($participant);
            }

            $agreement->addParty($party);
        }

        return $agreement;
    }

    /**
     * @param Agreement $agreement
     *
     * @return Agreement
     */
    public function create(Agreement $agreement): Agreement
    {
        $parties = [];
        foreach ($agreement->getParties() as $party) {
            $participants = [];
            foreach ($party->getParticipants() as $participant) {
                $participants[] = [
                    'fullname' => $participant->getName(),
                    'title' => $participant->getTitle(),
                    'email' => $participant->getEmail(),
                ];
            }
            $parties[] = [
                'name' => $party->getName(),
                'orgnr' => $party->getOrgnr(),
                'country' => $party->getCountry(),
                'consumer' => $party->isConsumer() ? 1 : 0,
                'participants' => $participants,
            ];
        }

        $array = [
            'collection_id' => $agreement->getCollection()->getId(),
            'source_id' => $agreement->getTemplate()->getAgreement()->getId(),
            'parties' => $parties,
        ];

        $data = $this->post('agreements/', $array, $this->credentials->getPosition());

        return $this->createAgreementObject($data);
    }

    /**
     * @param Agreement $agreement
     * @param \SplFileInfo $file
     */
    public function attachPdf(Agreement $agreement, \SplFileInfo $file): void
    {
        $this->postFile(sprintf('agreements/%s/pdfs/', $agreement->getId()), $file, $this->credentials->getPosition());
    }

    /**
     * @param Agreement $agreement
     * @param string $subject
     * @param string $message
     */
    public function publish(Agreement $agreement, string $subject, string $message): void
    {
        $data = [
            'subject' => $subject,
            'message' => $message,
        ];

        $this->post(sprintf('agreements/%s/publish', $agreement->getId()), $data, $this->credentials->getPosition());
    }
}
