<?php

namespace JGI\Oneflow\Model;

class Party
{
    /**
     * @var string|null
     */
    private $name;

    /**
     * @var string|null
     */
    private $identificationNumber;

    /**
     * @var string|null
     */
    private $countryCode;

    /**
     * @var bool
     */
    private $isMyParty = false;

    /** @var string */
    private $type = 'company';

    /**
     * @var Participant[]
     */
    private $participants = [];

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getIdentificationNumber(): ?string
    {
        return $this->identificationNumber;
    }

    public function setIdentificationNumber(?string $identificationNumber): void
    {
        $this->identificationNumber = $identificationNumber;
    }

    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    public function setCountryCode(?string $countryCode): void
    {
        $this->countryCode = $countryCode;
    }

    public function isMyParty(): bool
    {
        return $this->isMyParty;
    }

    public function setIsMyParty(bool $isMyParty): void
    {
        $this->isMyParty = $isMyParty;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return Participant[]
     */
    public function getParticipants(): array
    {
        return $this->participants;
    }

    /**
     * @param Participant[] $participants
     */
    public function setParticipants(array $participants): void
    {
        $this->participants = $participants;
    }

    public function addParticipant(Participant $participant): void
    {
        $this->participants[] = $participant;
    }
}
